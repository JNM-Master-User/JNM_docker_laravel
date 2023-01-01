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
        Schema::create('benefits_partners_services', function (Blueprint $table) {
            $table->uuid('id')->unique()->primaryKey();
            $table->foreignUuid('id_partners')->references('id')->on('partners')->onDelete('cascade');
            $table->foreignUuid('id_services')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('benefits_partners_services');
    }
};
