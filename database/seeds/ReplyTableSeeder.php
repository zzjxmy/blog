<?php

use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replys')->delete();
        $data = [
            ['content' => '我是用户ID：1 回复的是评论ID：1' , 'comment_id' => 1 , 'user_id' => 4],
            ['content' => '我是用户ID：2 回复的是评论ID：1' , 'comment_id' => 1 , 'user_id' => 5],
            ['content' => '我是用户ID：1 回复的是评论ID：2' , 'comment_id' => 2 , 'user_id' => 4],
            ['content' => '我是用户ID：2 回复的是评论ID：3' , 'comment_id' => 3 , 'user_id' => 5]
        ];
        foreach ($data as $value){
            \App\Model\Reply::create($value);
        }
    }
}
