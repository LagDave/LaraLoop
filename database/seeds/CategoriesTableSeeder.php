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
        DB::table('categories')->insert(['name'=>'web development']);
        DB::table('categories')->insert(['name'=>'android app development']);
        DB::table('categories')->insert(['name'=>'desktop app development']);
        DB::table('categories')->insert(['name'=>'freelancing']);
        
    }
}
