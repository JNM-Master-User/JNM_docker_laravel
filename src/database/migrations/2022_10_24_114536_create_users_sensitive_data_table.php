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
            $table->uuid('id')->primaryKey();
            $table->foreignUuid('id_user')->unique()->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('path_picture');
            $table->foreignUuid('id_institution_user')->nullable()->references('id')->on('institutions')->onDelete('set null');
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
        Schema::dropIfExists('users_sensitive_data');
    }
};
