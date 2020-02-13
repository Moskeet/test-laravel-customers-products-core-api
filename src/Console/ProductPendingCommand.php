<?php

namespace Core\Api\Console;

use Carbon\Carbon;
use Core\Api\Notifications\ProductWasPendingNotification;
use Illuminate\Console\Command;
use Core\Api\Models\Product;
use Illuminate\Support\Facades\Notification;

class ProductPendingCommand extends Command
{
    /**
     * @inheritDoc
     */
    protected $signature = 'products:pending';

    /**
     * @inheritDoc
     */
    protected $description = 'List of pending products';

    public function handle()
    {
        $date = Carbon::now()->addWeeks(-1);
        $products = Product::where('status','pending')->where('updated_at','<=',$date)->get();
        foreach($products as $product)
        {
            $this->info('Issn: '.$product->issn);
            $this->info('Name: '.$product->name);
            $this->info('Status: '.$product->status);
            $this->info('------------------------');

            Notification::route('mail', config('core-api.email'))
                ->notify(new ProductWasPendingNotification($product));
        }
    }
}
