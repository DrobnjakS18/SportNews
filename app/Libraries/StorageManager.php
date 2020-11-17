<?php
namespace App\Libraries;

use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;

class StorageManager
{

	function __construct()
	{

    }

    /**
     * Kopira sve fajlove unutar direktorijuma i smesta u drugi
     * Prazne direktorijume najverovantije ne kopira proveriti!!
     *
     * @param [type] $oldLocation
     * @param [type] $newLocation
     * @return void
     */
    public static function copyDir($oldLocation, $newLocation)
    {
        try {
            if(Storage::exists($newLocation)) throw new Exception("Directory already exists on this location");
            $files = Storage::allFiles($oldLocation);
            $directories = Storage::allDirectories($oldLocation);

            //uvodimo je zato sto ne bi valjalo da obrisemo neki direktorijum drugi kada nesto pukne
            $pathCreate = $newLocation;
            Storage::makeDirectory($pathCreate);
            foreach($directories as $directorium) {
                $newLoc = str_replace($oldLocation.'/', $newLocation."/", '/'.$directorium);
                Storage::makeDirectory($newLoc);// ne moze da se kopira direktorium kod s3a
            }

            foreach($files as $file) {
                $newLoc = str_replace($oldLocation.'/', $newLocation."/", '/'.$file);
                Storage::copy($file, $newLoc);
            }
		} catch (Exception $e) {

            if(isset($pathCreate)){
			    //brisemo ceo direktorijum
			    self::deleteDir($pathCreate);
            }
			throw $e;
		}
    }

    /**
     * Prebacuje direktorium na novu lokaciju
     *
     * @param [type] $oldLocation
     * @param [type] $newLocation
     * @return void
     */
    public static function moveDir($oldLocation, $newLocation)
    {
        //prebacujemo tako sto direktorium kopiramo na novu lokaciju a zatim stari direktorium obrisemo
        try {
            self::copyDir($oldLocation,$newLocation);
			self::deleteDir($oldLocation);
		} catch (Exception $e) {
			throw $e;
		}
    }

    /**
     * Brisemo direktorijum
     *
     * @param [type] $location
     * @return bool
     */
    public static function deleteDir($location)
    {
        return Storage::deleteDirectory($location);
    }

    /**
     * Vraca sve sto se nalazi unutar direktorijuma u hijerarhijskom redosledu.
     *
     * @param [type] $dirLocation
     * @return void
     */
    public static function getAllFromDir($dirLocation)
    {
        try {
            if(!Storage::exists($dirLocation)) throw new Exception("Directorium Location does not exists");

            $directorium = [
                "items" => [],
                "type" => "folder",
                "path" => $dirLocation
            ];
            $i = 0;
            $files = Storage::files($dirLocation);
            for ($k=0; $k < count($files); $k++) {
                $directorium['items'][$i] = [
                    "path" =>  $files[$k],
                    "type" => "file",
                ];
                $i++;
            }

            $directories = Storage::directories($dirLocation);
            for ($k=0; $k < count($directories); $k++) {
                $directorium['items'][$i] = self::getAllFromDir($directories[$k]);
                $i++;
            }

            return $directorium;
		} catch (Exception $e) {
			throw $e;
		}
    }

    public static function getLocalFile($path) {
        if (!Storage::disk('local')->exists($path)) {
            throw new Exception("File doesn't exist");
        }

        return Storage::disk('local')->get($path);
    }

    public static function deleteFile($path) {
        if (!Storage::exists($path)) {
            // LOG ERROR
            return;
        }

        Storage::delete($path);
    }

    public static function deleteLocalFile($path) {
        if (!Storage::disk('local')->exists($path)) {
            // LOG ERROR
            return;
        }

        Storage::disk('local')->delete($path);
    }

    public static function getName($path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function getBaseName($path)
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    public static function getSize($path)
    {
        return Storage::size($path);
    }

    public static function getUrl($path)
    {
        return config('filesystems.disks.s3.front_link') .$path;
    }

    public static function getTmpUrl($path, $time = null)
    {
        if($time === null) $time = now()->addMinutes(1440); // 24H
        return Storage::temporaryUrl($path, $time);
    }



    public static function putToFile($pathToFile, $fileContents,$fileName)
    {
        $fullPathFilename = $pathToFile.'/'.$fileName;

        $exists = Storage::disk('s3')->exists($fullPathFilename);

        if ($exists) {

            //Get only filename
            $onlyFileName = pathinfo($fileName,PATHINFO_FILENAME);
            //Get only extension
            $extension = $fileContents->getClientOriginalExtension();
            //Get filename to store
            $fileName = $onlyFileName.'_'.rand(1,100).'.'.$extension;
        }


        $path = $fileContents->storeAs($pathToFile,$fileName, 's3');

        Storage::disk('s3')->setVisibility($path, 'public');

        return $path;
    }

    /**
     * prebacujemo direktorijum iz middle s3-a na pblic nas storage
     *
     * @param [type] $middlePath
     * @return void
     */
    //https://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#copyobject
    public  static function copyDirectoriumFromMiddleS3($middlePath, $directoriumUniquePrefix)
    {

        try {

            if(!Storage::disk('s3Middle')->exists($middlePath)){
                throw new Exception("Do not exists directorium in middle");
            }
            $randDir = $directoriumUniquePrefix.'-'.Str::random(5);
            //za svaki slucaj vrsimo proveru da li postoji
            while(Storage::exists($randDir)){
                $randDir .= Str::random(5);
            }


            $files = Storage::disk('s3Middle')->allFiles($middlePath);
            $directories = Storage::disk('s3Middle')->allDirectories($middlePath);

            //uvodimo je zato sto ne bi valjalo da obrisemo neki direktorijum drugi kada nesto pukne
            $pathCreate = $randDir;
            Storage::makeDirectory($pathCreate);
            foreach($directories as $directorium) {
                $newLoc = str_replace($middlePath.'/', $randDir.'/', $directorium);
                Storage::makeDirectory($newLoc);// ne moze da se kopira direktorium kod s3a
            }

            foreach($files as $file) {
                $newLoc = str_replace($middlePath.'/', $randDir.'/', $file);
                Storage::getDriver()->getAdapter()->getClient()->copy(
                    config('filesystems.disks.s3Middle.bucket'),
                    $file,
                    config('filesystems.disks.s3.bucket'),
                    $newLoc,
                    'private'
                );
            }

		} catch (Exception $e) {

            if(isset($pathCreate)){
			    //brisemo ceo direktorijum
			    self::deleteDir($pathCreate);
            }
			throw $e;
		}

        return $randDir;
    }
}
?>
