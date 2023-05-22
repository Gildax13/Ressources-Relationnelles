<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Categories;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         Type::factory()->create([
             'name' => 'Texte',
         ]);
        Categories::factory()->create([
            'name' => 'Séries',
        ]);
        Categories::factory()->create([
            'name' => 'Films',
        ]);
        User::factory()->create();
    }
}
