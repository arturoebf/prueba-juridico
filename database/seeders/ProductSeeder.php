<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Producto 1',
            'price' => 123.45,
            'tax' => 5
        ]);
        Product::create([
            'name' => 'Producto 2',
            'price' => 45.65,
            'tax' => 15
        ]);
        Product::create([
            'name' => 'Producto 3',
            'price' => 39.73,
            'tax' => 12
        ]);
        Product::create([
            'name' => 'Producto 4',
            'price' => 250.00,
            'tax' => 8
        ]);
        Product::create([
            'name' => 'Producto 5',
            'price' => 59.35,
            'tax' => 10
        ]);
    }
}
