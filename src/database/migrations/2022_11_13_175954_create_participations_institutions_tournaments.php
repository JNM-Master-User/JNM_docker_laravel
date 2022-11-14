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
        Schema::create('participations_institutions_tournaments', function (Blueprint $table) {
            $table->uuid('id')->unique()->primaryKey();
            $table->foreignUuid('id_institution')->references('id')->on('institutions');
            $table->foreignUuid('id_tournament')->references('id')->on('tournaments');
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
        Schema::dropIfExists('participations_institutions_tournaments');
    }
};
