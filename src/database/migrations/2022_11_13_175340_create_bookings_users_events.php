<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings_users_events', function (Blueprint $table) {
            $table->uuid('id')->unique()->primaryKey();
            $table->foreignUuid('id_user')->references('id')->on('users');
            $table->foreignUuid('id_event')->references('id')->on('events');
            $table->timestamps();
            $table->userstamps('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings_users_events');
    }
};
