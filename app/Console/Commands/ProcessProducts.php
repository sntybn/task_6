<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class ProcessProducts extends Command
{
    protected $signature = 'products:process';

    protected $description = 'Memproses status produk berdasarkan stok';

    public function handle()
    {
        Product::chunk(100, function ($products) {

            foreach ($products as $product) {

                if ($product->stok == 0) {
                    $product->update([
                        'status' => 'out_of_stock'
                    ]);
                }else {
                    $product->update([
                        'status'=>'available'
                    ]);
                }

            }

        });

        $this->info('Produk berhasil diproses.');

        return Command::SUCCESS;
    }
}
