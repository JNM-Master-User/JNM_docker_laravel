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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->unique()->primaryKey();
            $table->foreignUuid('id_institution_manager')->references('id')->on('institutions');
            $table->string('name');
            $table->string('address');
            $table->date('date');
            $table->string('path_picture');
            $table->text('desc')->nullable();
            $table->timestamps();
            $table->userstamps('uuid');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreignUuid('id_event_belong')->nullable()->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
