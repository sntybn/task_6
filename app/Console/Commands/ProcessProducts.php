<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Jobs\UpdateProductStatusJob;

class ProcessProducts extends Command
{
    protected $signature = 'products:process';

    protected $description = 'Memproses status produk berdasarkan stok ke dalam Queue';

    public function handle()
    {
        Product::chunk(100, function ($products) {

        dispatch(new UpdateProductStatusJob($products));

        });

        $this->info('10.100 Produk berhasil dilempar ke antrean (Queue)!');

        return Command::SUCCESS;
    }
}
