<?php

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tag')->insert([
            [
                'post_id' => 1,
                'tag_id' => 16
            ],
            [
                'post_id' => 2,
                'tag_id' => 17
            ],
            [
                'post_id' => 4,
                'tag_id' => 18
            ],
            [
                'post_id' => 5,
                'tag_id' => 19
            ],
            [
                'post_id' => 6,
                'tag_id' => 3
            ],
            [
                'post_id' => 6,
                'tag_id' => 5
            ],
            [
                'post_id' => 7,
                'tag_id' => 3
            ],
            [
                'post_id' => 8,
                'tag_id' => 4
            ],
            [
                'post_id' => 9,
                'tag_id' => 6
            ],
            [
                'post_id' => 10,
                'tag_id' => 6
            ],
            [
                'post_id' => 10,
                'tag_id' => 7
            ],
            [
                'post_id' => 11,
                'tag_id' => 20
            ],
            [
                'post_id' => 12,
                'tag_id' => 20
            ],
            [
                'post_id' => 12,
                'tag_id' => 8
            ],
            [
                'post_id' => 13,
                'tag_id' => 9
            ],
            [
                'post_id' => 14,
                'tag_id' => 10
            ],
            [
                'post_id' => 14,
                'tag_id' => 11
            ],
            [
                'post_id' => 15,
                'tag_id' => 10
            ],
            [
                'post_id' => 16,
                'tag_id' => 12
            ],
            [
                'post_id' => 16,
                'tag_id' => 13
            ],
            [
                'post_id' => 17,
                'tag_id' => 14
            ],
            [
                'post_id' => 19,
                'tag_id' => 15
            ],
        ]);
    }
}
