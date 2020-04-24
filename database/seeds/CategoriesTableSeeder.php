<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'football',
                'color' => 'red'
            ],
            [
                'name' => 'basketball',
                'color' => 'green'
            ],
            [
                'name' => 'tenis',
                'color' => 'blue'
            ],
            [
                'name' => 'esports',
                'color' => 'black'
            ],
        ]);
    }
}
