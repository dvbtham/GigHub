<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('venue', 700);
            $table->dateTime('date');
            $table->unsignedInteger('artist_id');
            $table->unsignedInteger('genre_id');
            $table->boolean('is_canceled');

            $table->foreign('artist_id')->references('id')
                    ->on('users')->onDelete('cascade');

            $table->foreign('genre_id')->references('id')
                    ->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gigs');
    }
}
