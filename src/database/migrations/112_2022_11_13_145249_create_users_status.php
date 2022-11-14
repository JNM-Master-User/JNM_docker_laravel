<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Factories\UserStamps;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_status', function (Blueprint $table) {
            $table->uuid('id')->unique()->primaryKey();
            $table->string('type')->unique();
            $table->timestamps();
            $table->userstamps('uuid');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignUuid('id_user_status')->references('id')->on('users_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_status');
    }
};
