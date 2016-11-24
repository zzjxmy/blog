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
        DB::table('comments')->delete();
        $data = [
            ['id'=> 1 , 'content' => '我是评论1' , 'blog_id' => 1 , 'user_id' => 1],
            ['id'=> 2 , 'content' => '我是评论2' , 'blog_id' => 1 , 'user_id' => 2],
            ['id'=> 3 , 'content' => '我是评论3' , 'blog_id' => 1 , 'user_id' => 3],
            ['id'=> 4 , 'content' => '我是评论4' , 'blog_id' => 2 , 'user_id' => 2],
            ['id'=> 5 , 'content' => '我是评论5' , 'blog_id' => 2 , 'user_id' => 3],
            ['id'=> 6 , 'content' => '我是评论6' , 'blog_id' => 3 , 'user_id' => 1],
            ['id'=> 7 , 'content' => '我是评论7' , 'blog_id' => 3 , 'user_id' => 2],
        ];
        foreach ($data as $value){
            \App\Model\Comment::create($value);
        }
    }
}
