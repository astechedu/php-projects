<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category as Cat;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cat::factory(5)->create();
    }
}
