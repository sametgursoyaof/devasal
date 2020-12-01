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
            'active_ingredient' =>'Mültivitamin mineral kombinasyonu',
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
            'slug'=>'Ace_plus_selenyum_30_yumusak_kapsul',
            'status'=>'1'
        ]);
    }
}
