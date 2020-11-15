<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'text' => 'Liverpool title',
                'status' => 'verified',
                'user_id' => '1',
                'post_id' => '2'
            ],
            [
                'text' => 'Good luck Domenec Torrent',
                'status' => 'verified',
                'user_id' => '2',
                'post_id' => '1'
            ],
            [
                'text' => 'Pep Guardiola great coach',
                'status' => 'verified',
                'user_id' => '1',
                'post_id' => '1'
            ],
        ]);
    }
}
