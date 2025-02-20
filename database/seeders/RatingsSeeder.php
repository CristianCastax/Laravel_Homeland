<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Rating;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = Property::all(); // Obtener todas las propiedades

        foreach ($properties as $property) {
            Rating::factory()->count(rand(2, 7))->create([
                'property_id' => $property->id, // Asignar reseñas a cada propiedad
            ]);
        }
    }
}
