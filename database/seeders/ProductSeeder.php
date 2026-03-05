<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1, // Outils à main
                'name'        => 'Marteau de charpentier',
                'description' => 'Marteau professionnel 500g, manche en bois robuste.',
                'price'       => 5500,
                'is_featured' => true,
                'is_active'   => true,
            ],
            [
                'category_id' => 1,
                'name'        => 'Tournevis cruciforme',
                'description' => 'Tournevis cruciforme avec manche ergonomique antidérapant.',
                'price'       => 2500,
                'is_featured' => true,
                'is_active'   => true,
            ],
            [
                'category_id' => 1,
                'name'        => 'Pince universelle',
                'description' => 'Pince multifonction en acier trempé haute résistance.',
                'price'       => 4000,
                'is_featured' => false,
                'is_active'   => true,
            ],
            [
                'category_id' => 2, // Matériaux
                'name'        => 'Ciment Portland 50kg',
                'description' => 'Sac de ciment Portland de haute qualité pour construction.',
                'price'       => 8000,
                'is_featured' => true,
                'is_active'   => true,
            ],
            [
                'category_id' => 3, // Électricité
                'name'        => 'Câble électrique 2.5mm',
                'description' => 'Câble électrique souple 2.5mm², vendu au mètre.',
                'price'       => 1500,
                'is_featured' => false,
                'is_active'   => true,
            ],
            [
                'category_id' => 4, // Plomberie
                'name'        => 'Robinet mélangeur',
                'description' => 'Robinet mélangeur chromé pour salle de bain.',
                'price'       => 15000,
                'is_featured' => true,
                'is_active'   => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}