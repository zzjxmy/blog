<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //禁止所有限制条件
        Model::unguard();
        //如果发现找不到类 请执行 composer dump-autoload
        $this->call(BlogsSubjectTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(ReplyTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        //重置
        Model::reguard();
    }
}
