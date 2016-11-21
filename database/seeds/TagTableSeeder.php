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
            ['name' => 'HTML', 'target_class' => 'label-primary'],
            ['name' => 'JS', 'target_class' => 'label-primary'],
            ['name' => 'Jquery', 'target_class' => 'label-primary'],
            ['name' => 'PHP', 'target_class' => 'label-info'],
            ['name' => 'Nginx', 'target_class' => 'label-default'],
            ['name' => 'Apache', 'target_class' => 'label-default'],
            ['name' => 'Mysql', 'target_class' => 'label-primary'],
            ['name' => 'Laravel', 'target_class' => 'label-success'],
            ['name' => 'Yii', 'target_class' => 'label-success'],
            ['name' => 'Linux', 'target_class' => 'label-danger'],
            ['name' => 'Centos', 'target_class' => 'label-danger'],
        ];
        foreach ($attributes as $attribute){
            \App\Model\Tag::create([
                'name' => $attribute['name'],
                'target_class' => $attribute['target_class'],
            ]);
        }
    }
}
