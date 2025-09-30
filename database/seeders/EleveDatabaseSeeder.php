<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EleveDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Classe::factory(3)->create()->each(function ($classe) {
            $classe->eleves()->saveMany(
                \App\Models\Eleve::factory(10)->make()
            );
        });
    }
}
