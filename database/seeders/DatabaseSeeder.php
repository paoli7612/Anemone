<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name' => 'Acqua naturale', 'stock' => 24]);
        Product::create(['name' => 'Acqua frizzante', 'stock' => 24]);
        Product::create(['name' => 'Cocacola plastica', 'stock' => 16]);
        Product::create(['name' => 'Cocacola zero plastica', 'stock' => 16]);
        Product::create(['name' => 'Cocacola vetro', 'stock' => 32]);
        Product::create(['name' => 'Cocacola zero vetro', 'stock' => 32]);
    }
}
