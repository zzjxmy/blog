<?php

use Illuminate\Database\Seeder;

class BlogsSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs_subjects')->delete();
        $data = [
            ['blog_id' => 1 , 'subject_id' => 1],
            ['blog_id' => 1 , 'subject_id' => 2],
            ['blog_id' => 2 , 'subject_id' => 3],
            ['blog_id' => 3 , 'subject_id' => 4],
            ['blog_id' => 4 , 'subject_id' => 5],
            ['blog_id' => 4 , 'subject_id' => 6],
        ];
        foreach ($data as $value){
            \App\Model\BlogsSubject::create($value);
        }
    }
}
