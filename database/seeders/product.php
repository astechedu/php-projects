<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
      User::factory(5)->create();
/*
        Product::factory()->create(
        [
            //'name' => 'laptop',
            //'description' => 'This is good in condition.',
            //'price' => 200,
        ],
  
    }
}
