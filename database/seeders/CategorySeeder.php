<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'تركيب',
                'image' => 'categories/installation.png',
                'status' => 'active',
            ],
            [
                'name' => 'صيانة',
                'image' => 'categories/maintenance.png',
                'status' => 'active',
            ],
            [
                'name' => 'اعطال',
                'image' => 'categories/repairs.png',
                'status' => 'active',
            ],
            [
                'name' => 'قطع غيار',
                'image' => 'categories/spare_parts.png',
                'status' => 'active',
            ],
            [
                'name' => 'شهادات الفحص',
                'image' => 'categories/inspection.png',
                'status' => 'inactive', 
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}