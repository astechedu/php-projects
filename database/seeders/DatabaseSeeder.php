<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //User::factory(5)->create();

        //User::factory()->create([
            //'name' => 'ajay',
            //'email' => 'exmple1@gmail.com',
            //'password' => Hash::make('ajay123')
        //]
        
        //Product::factory()->create([
            //'name' => 'laptop',
            //'description' => 'This is good in condition.',
            //'price' => 200,
        //]

    //);
        User::factory(5)->create();
        Product::factory(10)->create();
    }
}
