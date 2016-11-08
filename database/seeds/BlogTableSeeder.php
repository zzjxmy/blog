<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->delete();
        $data = [
            [ 'title' => 'This Is 1' , 'content' => 'This Is 1' , 'user_id' => 1],
            [ 'title' => 'This Is 2' , 'content' => 'This Is 2' , 'user_id' => 2],
            [ 'title' => 'This Is 3' , 'content' => 'This Is 3' , 'user_id' => 3],
            [ 'title' => 'This Is 4' , 'content' => 'This Is 4' , 'user_id' => 4],
        ];
        foreach ($data as $value){
            \App\Model\Blog::create($value);
        }
    }
}
