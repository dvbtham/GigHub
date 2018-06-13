<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followings', function (Blueprint $table) {

            $table->primary(['follower_id', 'followee_id']);

            $table->unsignedInteger('follower_id');

            $table->unsignedInteger('followee_id');

            $table->boolean('is_canceled')->default(false);

            $table->foreign('followee_id')->references('id')
                    ->on('users')->onDelete('cascade');

            $table->foreign('follower_id')->references('id')
                    ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followings');
    }
}
