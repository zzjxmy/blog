<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs',function(Blueprint $table){
            $table->mediumIncrements('id');
            $table->string('title',50);
            $table->text('content');
            $table->mediumInteger('look_num',false,true)->default(1);
            $table->mediumInteger('praise_num',false,true)->default(0);
            $table->mediumInteger('user_id',false,true);
            $table->tinyInteger('state',false,true)->default(1);
            $table->timestamps();
            $table->index('user_id');
            $table->index('state');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blogs');
    }
}
