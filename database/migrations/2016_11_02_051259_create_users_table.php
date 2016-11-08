<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->mediumIncrements('id');
            $table->string('username',8);
            $table->string('account',32)->unique();
            $table->char('password',32);
            $table->tinyInteger('is_delete',false,true)->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('state',false,true)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
