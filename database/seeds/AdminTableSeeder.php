<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        \App\Model\Admin::create([
            'name' => 'admin',
            'password' => md5('admin')
        ]);
    }
}
