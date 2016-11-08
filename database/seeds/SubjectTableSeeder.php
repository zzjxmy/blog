<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        $attributes = [
            'JS',
            'PHP',
            'Jquery',
            'HTML',
            'Nginx',
            'Linux',
            'Apache',
            'Mysql',
            'Laravel',
            'Yii',
            'Centos'
        ];
        foreach ($attributes as $attribute){
            \App\Model\Subject::create([
                'name' => $attribute
            ]);
        }
    }
}
