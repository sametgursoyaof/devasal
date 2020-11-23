<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Gülin Karadeniz',
            'email'=>'gulinkaradeniz@gmail.com',
            'password'=>'$2y$10$9lZFhTZklp6.WKZYrroLXO7EYs7G2M1CDtCRTotN7chTH2tXcVQk2'
        ]);
    }
}
