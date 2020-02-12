<?php

namespace Core\Api\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Core\Api\Models\Product;

class ProductPendingCommand extends Command
{
    protected $signature = 'products:pending';

    protected $description = 'List of pending products';

    public function handle()
    {
        $date = Carbon::now()->addWeeks(-1);
        $products = Product::where('status','pending')->where('updated_at','<=',$date)->get();
        foreach($products as $product)
        {
            $this->info('Issn: '.$product->issn.'\n'
                        .'Name: '.$product->name.'\n'
                        .'Status: '.$product->status.'\n'
                        .'-------------------------- \n'
            );
            Notification::route('mail', 'taylor@example.com')
                ->notify(new InvoicePaid($invoice));
        }
    }
}
