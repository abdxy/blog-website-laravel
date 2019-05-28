<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    
        for($i=0;$i<40;$i++)
        DB::table('articles')->insert([
            'title' => Str::random(10),
            'description' => Str::random(40),
            'content' => Str::random(100),
            'user_id'=>1,
            'slug' => Str::random(10),
            'category_id'=>1,
            'status'=>'accepted',
            'cover'=>'placeholder.png',
            'rating'=>12,
            'published_at'=>now()
        ]);
    }
}
