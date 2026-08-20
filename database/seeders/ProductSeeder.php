<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 10000; $i++){
            Product::create([
                'nama'=> 'Produk' . $i,
                'stok'=> rand(0, 20),
                'harga'=> rand(10000,100000),
                'status'=> ' avilable'

            ]);
        }
    }
}
