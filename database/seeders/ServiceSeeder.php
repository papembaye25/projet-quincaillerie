<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service; 
class ServiceSeeder extends Seeder
{
    
    public function run(): void
    {
        $services =[
            [
                'title' => 'Vente d\'outils de qualité',
                'description' => 'Large gamme d\'outils professionnels et domestiques pour tous vos travaux.',
                'icon' => 'wrench',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Support client 24/7',
                'description' => 'Notre équipe de support est disponible 24/7 pour répondre à toutes vos questions.',
                'icon' => 'fa-solid fa-headset',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Matériaux de construction',
                'description' => 'Tous les matériaux nécessaires pour vos projets de construction et rénovation.',
                'icon' => 'building',
                'order'=> 2,
                'is_active'=> true,
            ],
            [
                'title' => 'Conseils techniques',
                'description' => 'Notre équipe vous conseille et vous guide pour réussir vos travaux.',
                'icon' => 'chat',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Livraison à domicile',
                'description' => 'Livraison rapide de vos commandes directement sur votre chantier à Dakar',
                'icon' => 'truck',
                'order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
