<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    
    public function run(): void
    {
        $categories =[
            [
              'name' => 'Outils à main',
              'description' => 'Marteaux, tournevis, pinces et plus',
              'is_active' => true,
            ],
            [
                'name' => 'Matériaux de construction',
                'description' => 'Ciment, briques, bois et autres matériaux',
                'is_active' => true,
            ],
            [
                'name' => 'Electricité',
                'description' => 'Câbles, interrupteurs, prises et plus',
                'is_active' => true,
            ],
            [
                'name' => 'Plomberie',
                'description' => 'Tuyaux, raccords, robinets et autres accessoires de plomberie',
                'is_active' => true,
            ],
            [
                'name' => 'Quincaillerie générale',
                'description' => 'Vis, boulons, écrous et plus',
                'is_active' => true,
            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
