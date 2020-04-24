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
                'text' => 'comment1',
                'user_id' => '1',
                'post_id' => '2'
            ],
            [
                'text' => 'comment2',
                'user_id' => '2',
                'post_id' => '1'
            ],
            [
                'text' => 'comment3',
                'user_id' => '1',
                'post_id' => '1'
            ],
        ]);
    }
}
