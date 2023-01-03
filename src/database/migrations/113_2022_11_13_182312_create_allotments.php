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
        Schema::create('allotments', function (Blueprint $table) {
            $table->uuid('id')->unique()->primaryKey();
            $table->string('name');
            $table->string('address');
            $table->date('date');
            $table->string('path_picture');
            $table->text('desc')->nullable();
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
        Schema::dropIfExists('allotments');
    }
};
