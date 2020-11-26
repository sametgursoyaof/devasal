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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('formula')->nullable();
            $table->text('pharmacological')->nullable();
            $table->text('indication')->nullable();
            $table->text('kontrendikasyon')->nullable();
            $table->text('warning')->nullable();
            $table->text('side_effects')->nullable();
            $table->text('usage')->nullable();
            $table->text('extra_information')->nullable();
            $table->text('barcode')->nullable();
            $table->integer('companies_id');
            $table->text('slug');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('medicines');
    }
}
