<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devasal', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->text('formula');
            $table->text('pharmacological');
            $table->text('indication');
            $table->text('warning');
            $table->text('side_effects');
            $table->text('usage');
            $table->text('extra_information');
            $table->text('barcode');
            $table->integer('componies_id');
            $table->string('url')->unique();
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
        Schema::dropIfExists('devasal');
    }
}
