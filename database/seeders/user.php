<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory(5)->create();
/*
        User::factory()->create(
        [
            //'name' => 'ajay',
            //'email' => 'exmple1@gmail.com',
            //'password' => Hash::make('ajay123')
        ],
        [
            //'name' => 'bhanu',
            //'email' => 'exmple2@gmail.com',
            //'password' => Hash::make('bhanu123')
        ],   
        [
            //'name' => 'bhanu',
            //'email' => 'exmple2@gmail.com',
            //'password' => Hash::make('bhanu123')
        ],   
        [
            //'name' => 'bhanu',
            //'email' => 'exmple2@gmail.com',
            //'password' => Hash::make('bhanu123')
        ], 
        [
            //'name' => 'bhanu',
            //'email' => 'exmple2@gmail.com',
            //'password' => Hash::make('bhanu123')
        ],     
*/                                
    }
}
