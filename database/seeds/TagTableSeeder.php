<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name' => 'tag1'
            ],
            [
                'name' => 'tag2'
            ],
            [
                'name' => 'NBA'
            ],
            [
                'name' => 'Anthony Davis'
            ],
            [
                'name' => 'Giannis Antetokounmpo'
            ],
            [
                'name' => 'Euroleague'
            ],
            [
                'name' => 'Fantasy'
            ],
            [
                'name' => 'Rafael Nadal'
            ],
            [
                'name' => 'Taylor Townsend'
            ],
            [
                'name' => 'ATP'
            ],
            [
                'name' => 'Nick Kyrgios'
            ],
            [
                'name' => 'Microsoft'
            ],
            [
                'name' => 'Xbox'
            ],
            [
                'name' => 'Assassin\'s Creed'
            ],
            [
                'name' => 'League of Legends'
            ],
            [
                'name' => 'Pep Guardiola'
            ],
            [
                'name' => 'Liverpool'
            ],
            [
                'name' => 'Benfica'
            ],
            [
                'name' => 'Zlatan Ibrahimovic'
            ],
            [
                'name' => 'WTA'
            ],

        ]);
    }
}
