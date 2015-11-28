<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('follower_id')->unsigned();
            $table->integer('followed_user_id')->unsigned();
            $table->timestamp('created_at');

            $table->foreign('follower_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('followed_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique(array('follower_id', 'followed_user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_follows');
    }
}
