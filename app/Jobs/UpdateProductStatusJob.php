<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateProductStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $products;
    /**
     * Create a new job instance.
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->products as $product) {
            if ($product->stok == 0){
                $product->update([
                    'status'=>'out_of_stock'
                ]);
            }else{
                $product->update([
                    'status'=>'available'
                ]);
            }
        }
    }
}
