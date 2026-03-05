<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // L'ordre est important !
        // Categories d'abord car Products en dépend
        
        $this->call([
            CategorySeeder::class,
            ServiceSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
