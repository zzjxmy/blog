<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        $attributes = [
            ['id'=> 1 , 'name' => 'HTML', 'target_class' => 'label-primary'],
            ['id'=> 2 , 'name' => 'JS', 'target_class' => 'label-primary'],
            ['id'=> 3 , 'name' => 'Jquery', 'target_class' => 'label-primary'],
            ['id'=> 4 , 'name' => 'PHP', 'target_class' => 'label-info'],
            ['id'=> 5 , 'name' => 'Nginx', 'target_class' => 'label-default'],
            ['id'=> 6 , 'name' => 'Apache', 'target_class' => 'label-default'],
            ['id'=> 7 , 'name' => 'Mysql', 'target_class' => 'label-primary'],
            ['id'=> 8 , 'name' => 'Laravel', 'target_class' => 'label-success'],
            ['id'=> 9 , 'name' => 'Yii', 'target_class' => 'label-success'],
            ['id'=> 10 , 'name' => 'Linux', 'target_class' => 'label-danger'],
            ['id'=> 11 , 'name' => 'Centos', 'target_class' => 'label-danger'],
        ];
        foreach ($attributes as $attribute){
            \App\Model\Tag::create($attribute);
        }
    }
}
