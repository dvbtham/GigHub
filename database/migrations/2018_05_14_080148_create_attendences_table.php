<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {

            $table->unsignedInteger('gig_id');

            $table->unsignedInteger('attendee_id');

            $table->boolean('is_canceled');

            $table->foreign('attendee_id')->references('id')
                    ->on('users')->onDelete('cascade');

            $table->foreign('gig_id')->references('id')
                    ->on('gigs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendences');
    }
}
