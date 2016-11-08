<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replys',function(Blueprint $table){
            $table->mediumIncrements('id');
            $table->string('content',255);
            $table->mediumInteger('comment_id',false,true);
            $table->mediumInteger('user_id',false,true);
            $table->timestamps();
            $table->index('comment_id');
            $table->index('user_id');
            //$table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('replys');
    }
}
