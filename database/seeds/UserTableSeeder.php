<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data = [
            [ 'id'=> 1 , 'username' => 'user1' , 'account' => 'user1' , 'email' => '123456@qq.com' , 'password' => md5('123456')],
            [ 'id'=> 2 , 'username' => 'user2' , 'account' => 'user2' , 'email' => '234567@qq.com' , 'password' => md5('123456')],
            [ 'id'=> 3 , 'username' => 'user3' , 'account' => 'user3' , 'email' => '345678@qq.com' , 'password' => md5('123456')],
            [ 'id'=> 4 , 'username' => 'user4' , 'account' => 'user4' , 'email' => '456789@qq.com' , 'password' => md5('123456')],
            [ 'id'=> 5 , 'username' => 'user5' , 'account' => 'user5' , 'email' => '567890@qq.com' , 'password' => md5('123456')],
        ];
        foreach ($data as $value){
            \App\Model\User::create($value);
        }
    }
}
