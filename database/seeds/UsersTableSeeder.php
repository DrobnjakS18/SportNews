<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Author Stefan',
                'slug' => 'author-stefan',
                'email' => 'drobnjak.stefan18@gmail.com',
                'email_verified_at' => '2020-03-05 18:08:19',
                'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit quod molestias delectus illum quisquam. Quasi iure perferendis suscipit officiis dicta!',
                'password' => Hash::make('123123123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role_id' => 2,
            ],
            [
                'name' => 'User Stefan',
                'slug' => 'user-stefan',
                'email' => 'stefi@gmail.com',
                'email_verified_at' => '2020-03-05 18:08:19',
                'about' => null,
                'password' => Hash::make('123123123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role_id' => 3,
            ],
        ]);
    }
}
