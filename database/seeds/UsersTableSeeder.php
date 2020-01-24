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
                'name' => 'Author-Stefan',
                'email' => 'drobnjak.stefan18@gmail.com',
                'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit quod molestias delectus illum quisquam. Quasi iure perferendis suscipit officiis dicta!',
                'password' => Hash::make('123123123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role_id' => 2,
            ],
            [
                'name' => 'User-Stefan',
                'email' => 'stefi@gmail.com',
                'about' => null,
                'password' => Hash::make('123123123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role_id' => 3,
            ],
        ]);
    }
}
