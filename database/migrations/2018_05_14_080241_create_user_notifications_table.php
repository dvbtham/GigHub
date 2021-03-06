<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('notification_id');

            $table->boolean('is_read')->default(false);

            $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');

            $table->foreign('notification_id')->references('id')
                    ->on('notifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notifications');
    }
}
