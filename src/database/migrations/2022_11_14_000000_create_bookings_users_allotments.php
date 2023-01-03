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
        Schema::create('bookings_users_allotments', function (Blueprint $table) {
            $table->uuid('id')->unique()->primaryKey();
            $table->foreignUuid('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('id_allotment')->references('id')->on('allotments')->onDelete('cascade');
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
        Schema::dropIfExists('bookings_users_allotments');
    }
};
