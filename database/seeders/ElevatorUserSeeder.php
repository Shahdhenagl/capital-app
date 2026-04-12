<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElevatorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       ElevatorUser::create([
            'user_id'         => 1,
            'elevator_type'   => 'Panoramic',
            'location'        => '24.7136, 46.6753', 
            'official_number' => 'CR-554433',
            'address'         => 'الرياض، حي الملقا',
            'is_subscribed'   => true,
            'payment_plan'    => 'annual',
            'is_active'       => true,
        ]);
    }
}
