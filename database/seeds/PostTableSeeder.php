<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'First Look At Self-Portrait\'s Autumn Collection',
                'slug' => 'First-Look-At-Self-Portrait-s-Autumn-Collection',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-03.jpg',
                'select' => "1",
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Apple HomePod review: locked in',
                'slug' => 'Apple-HomePod-review:-locked-in',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-07.jpg',
                'select' => "1",
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Intel’s new smart glasses actually look good',
                'slug' => 'Intel’s-new-smart-glasses-actually-look-good',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-01.jpg',
                'select' => "0",
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Call Of Duty: Black Ops 4 Releasing',
                'slug' => 'Call-Of-Duty:-Black-Ops-4-Releasing',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-03.jpg',
                'select' => "1",
                'user_id' => 1,
                'category_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Call Of Duty: Black Ops 4 Releasing',
                'slug' => 'Call-Of-Duty:-Black-Ops-4-Releasing',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-05.jpg',
                'select' => "0",
                'user_id' => 1,
                'category_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Call Of Duty: Black Ops 4 Releasing',
                'slug' => 'Call-Of-Duty:-Black-Ops-4-Releasing',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-06.jpg',
                'select' => "1",
                'user_id' => 1,
                'category_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Call Of Duty: Black Ops 4 Releasing',
                'slug' => 'Call-Of-Duty:-Black-Ops-4-Releasing',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-06.jpg',
                'select' => "0",
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Call Of Duty: Black Ops 4 Releasing',
                'slug' => 'Call-Of-Duty:-Black-Ops-4-Releasing',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-03.jpg',
                'select' => "0",
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Call Of Duty: Black Ops 4 Releasing',
                'slug' => 'Call-Of-Duty:-Black-Ops-4-Releasing',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-03.jpg',
                'select' => "0",
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Call Of Duty: Black Ops 4 Releasing',
                'slug' => 'Call-Of-Duty:-Black-Ops-4-Releasing',
                'content' => 'It was a cheerful prospect. I asked Perry what he thought about it; but he only shrugged his shoulders and continued a longwinded prayer he had been at for some time. He was wont to say that the only redeeming feature of our captivity was the ample time it gave him for the improvisation of prayers',
                'picture' => 'news-03.jpg',
                'select' => "0",
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
