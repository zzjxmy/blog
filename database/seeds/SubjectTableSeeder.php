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
        $data = [
            ['id'=> 1 , 'name' => '数据库'],
            ['id'=> 2 , 'name' => '资料'],
            ['id'=> 3 , 'name' => '操作系统'],
            ['id'=> 4 , 'name' => '编程语言']
        ];
        foreach ($data as $value){
            \App\Model\Subject::create($value);
        }
    }
}
