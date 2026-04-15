<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $cities = ['Makkah', 'Jeddah'];

    $types = [
        'technician',
        'manager',
        'user',
        'customer_service'
    ];

    foreach ($cities as $city) {
        foreach ($types as $type) {

            User::create([
                'name' => $type . '_' . $city,
                'email' => $type . '_' . $city . '@gmail.com',
                'password' => Hash::make('12345678'),
                'city' => $city,
                'type' => $type,
            ]);

        }
    }
}
}
