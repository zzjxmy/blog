<?php

use Illuminate\Database\Seeder;

class BlogsTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs_tags')->delete();
        $data = [
            ['id'=> 1 , 'blog_id' => 1 , 'tag_id' => 1],
            ['id'=> 2 , 'blog_id' => 1 , 'tag_id' => 2],
            ['id'=> 3 , 'blog_id' => 2 , 'tag_id' => 3],
            ['id'=> 4 , 'blog_id' => 3 , 'tag_id' => 4],
            ['id'=> 5 , 'blog_id' => 4 , 'tag_id' => 5],
            ['id'=> 6 , 'blog_id' => 4 , 'tag_id' => 6],
        ];
        foreach ($data as $value){
            \App\Model\BlogsTag::create($value);
        }
    }
}
