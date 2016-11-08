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
            [ 'username' => 'user1' , 'account' => 'user1' , 'password' => md5('123456')],
            [ 'username' => 'user2' , 'account' => 'user2' , 'password' => md5('123456')],
            [ 'username' => 'user3' , 'account' => 'user3' , 'password' => md5('123456')],
            [ 'username' => 'user4' , 'account' => 'user4' , 'password' => md5('123456')],
            [ 'username' => 'user5' , 'account' => 'user5' , 'password' => md5('123456')],
        ];
        foreach ($data as $value){
            \App\Model\User::create($value);
        }
    }
}
