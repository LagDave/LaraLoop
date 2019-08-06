<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(['name'=>'python']);
        DB::table('tags')->insert(['name'=>'java']);
        DB::table('tags')->insert(['name'=>'html']);
        DB::table('tags')->insert(['name'=>'php']);
        DB::table('tags')->insert(['name'=>'javascript']);
    }
}
