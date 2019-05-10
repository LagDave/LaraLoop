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
         $this->call([
             UsersTableSeeder::class,
             RolesTableSeeder::class,
             TagsTableSeeder::class,
             PostTagTableSeeder::class,
             PostTableSeeder::class,
             CategoriesTableSeeder::class
         ]);
    }
}
