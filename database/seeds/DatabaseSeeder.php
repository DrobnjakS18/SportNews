<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(UpdateViewsPostTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
        $this->call(AdminTableSeeder::class);

    }
}
