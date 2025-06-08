<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'کفش ورزشی',
                'color' => json_encode(['سفید', 'مشکی']),
                'size' => json_encode(['38', '40', '42']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تی شرت',
                'color' => json_encode(['سبز', 'آبی', 'طوسی']),
                'size' => json_encode(['S', 'L', 'XL']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'هودی',
                'color' => json_encode(['نارنجی']),
                'size' => json_encode(['L', 'XL']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
