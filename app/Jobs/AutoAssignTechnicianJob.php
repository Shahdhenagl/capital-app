<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AutoAssignTechnicianJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function handle()
    {
        $order = Order::find($this->orderId);

        if (!$order) return;

        if (!$order->technician_id) {

            $client = $order->user;

            $technician = User::where('type', 'technician')
                       ->where('city', $client->city)            
                ->get()
                ->sortBy(function ($tech) use ($client) {
                    return $this->distance(
                        $client->lat,
                        $client->long,
                        $tech->lat,
                        $tech->long
                    );
                })
                ->first();

            if ($technician) {
                $order->technician_id = $technician->id;
                $order->status = 'assigned';
                $order->save();
            }
        }
    }

    private function distance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat/2) ** 2 +
            cos(deg2rad($lat1)) *
            cos(deg2rad($lat2)) *
            sin($dLon/2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        return $earthRadius * $c;
    }
}