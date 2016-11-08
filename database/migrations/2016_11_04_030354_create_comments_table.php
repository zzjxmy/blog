<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function(Blueprint $table){
            $table->mediumIncrements('id');
            $table->string('content',255);
            $table->mediumInteger('blog_id',false,true);
            $table->mediumInteger('user_id',false,true);
            $table->timestamps();
            $table->index('blog_id');
            $table->index('user_id');
            //$table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
