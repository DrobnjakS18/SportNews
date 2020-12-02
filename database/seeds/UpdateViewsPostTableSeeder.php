<?php

use Illuminate\Database\Seeder;

class UpdateViewsPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [];

        for ($i = 1; $i <= 20; $i++){
            array_push($ids, $i);
        }

        DB::table('posts')->whereIn('id', $ids)->update(['views' => 1]);
    }
}
