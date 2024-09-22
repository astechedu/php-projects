<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use App\Models\Order;

class order extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
      Order::factory(5)->create();

        Product::factory()->create(
        [
            //'name' => 'laptop',
            //'description' => 'This is good in condition.',
            //'price' => 200,
        ],
    );
  
    }
    
}
