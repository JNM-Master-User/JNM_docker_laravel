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
        Schema::create('users_sensitive_data', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('id_user')->index();
            $table->string('name');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_sensitive_data');
    }
};
