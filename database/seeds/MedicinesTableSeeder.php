<?php

use Illuminate\Database\Seeder;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            'name' =>'Ace plus selenyum 30 yumusak kapsul',
            'description'=>'Vitamin c + vitamin e + selenyum',
            'formula'=>'',
            'pharmacological'=>'',
            'indication'=>'',
            'kontrendikasyon'=>'',
            'warning'=>'',
            'side_effects'=>'',
            'usage'=>'',
            'extra_information'=>'Reçetesiz ile satilir',
            'barcode'=>'8699828190042',
            'companies_id'=>'1',
            'url'=>'http://localhost:8000/medicines/Ace-plus-selenyum-30-yumusak-kapsul'
        ]);
    }
}
