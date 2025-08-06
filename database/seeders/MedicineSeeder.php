<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    public function run(): void
    {
        $medicines = [
            [
                'name' => 'Paracetamol 500mg',
                'description' => 'Obat pereda nyeri dan penurun demam',
                'price' => 5000,
                'stock' => 100,
                'category' => 'Obat Bebas',
                'expired_date' => now()->addMonths(12),
                'manufacturer' => 'Kimia Farma',
                'image' => 'paracetamol_500mg.jpg',
            ],
            [
                'name' => 'Amoxicillin 500mg',
                'description' => 'Antibiotik untuk infeksi bakteri',
                'price' => 15000,
                'stock' => 50,
                'category' => 'Obat Keras',
                'expired_date' => now()->addMonths(18),
                'manufacturer' => 'Kalbe Farma',
                'image' => 'amoxicillin_500mg.jpg',
            ],
            [
                'name' => 'Vitamin C 1000mg',
                'description' => 'Suplemen vitamin C untuk daya tahan tubuh',
                'price' => 25000,
                'stock' => 75,
                'category' => 'Suplemen',
                'expired_date' => now()->addMonths(24),
                'manufacturer' => 'Sido Muncul',
                'image' => 'vitamin_c_1000mg.jpg',
            ],
            [
                'name' => 'Ibuprofen 400mg',
                'description' => 'Anti inflamasi dan pereda nyeri',
                'price' => 8000,
                'stock' => 5, // Low stock
                'category' => 'Obat Bebas Terbatas',
                'expired_date' => now()->addMonths(6),
                'manufacturer' => 'Dexa Medica',
                'image' => 'ibuprofen_400mg.jpg',
            ],
            [
                'name' => 'Antasida DOEN',
                'description' => 'Obat maag dan gangguan lambung',
                'price' => 12000,
                'stock' => 80,
                'category' => 'Obat Bebas',
                'expired_date' => now()->addMonths(15),
                'manufacturer' => 'Tempo Scan Pacific',
                'image' => 'antasida_doen.jpg',
            ]
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }
    }
}