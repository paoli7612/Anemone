<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $bibite = Category::create(['name' => 'bibite']);
        $panetti = Category::create(['name' => 'panetti']);
        $scorte = Category::create(['name' => 'scorte']);

        Product::new('Acqua naturale', 24, $bibite);
        Product::new('Acqua frizzante', 24, $bibite);
        Product::new('Cocacola plastica', 16, $bibite);
        Product::new('Cocacola zero plastica', 16, $bibite);
        Product::new('Cocacola vetro', 32, $bibite);
        Product::new('Cocacola zero vetro', 32, $bibite);
        Product::new('Limonata', 32, $bibite);
        Product::new('Chinotto', 32, $bibite);
        Product::new('Gassosa', 32, $bibite);
        Product::new('Fanta orange', 32, $bibite);
        Product::new('Fanta lemon', 32, $bibite);

        Product::new('Normale', 20, $panetti);
        Product::new('Integrale', 16, $panetti);
        Product::new('Kamut', 16, $panetti);

        User::new('tomaoli', 'paoli7612@gmail.com', 'qwerty');
    }
}
