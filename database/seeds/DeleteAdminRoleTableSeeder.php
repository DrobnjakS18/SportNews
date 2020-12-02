<?php

use Illuminate\Database\Seeder;

class DeleteAdminRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->where('name','admin')->delete();
    }
}
