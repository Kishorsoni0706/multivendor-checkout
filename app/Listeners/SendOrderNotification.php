<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OrderPlaced;

class SendOrderNotification
{
    /**
     * Create the event listener.
     */
   public function handle(OrderPlaced $event)
    {
        $order = $event->order;

        \Log::info('Order placed', [
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'vendor_id' => $order->vendor_id,
            'total' => $order->total,
        ]);
    }

    
}
