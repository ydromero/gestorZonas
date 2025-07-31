<?php

namespace Database\Seeders;

use App\Models\Contacto;
use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_ES');
        $zonas = Zona::all();

        if ($zonas->isEmpty()) {
            // Si por alguna razón no hay zonas (ej. si corres solo este seeder),
            // asegúrate de que se siembren primero.
            $this->call(ZonaSeeder::class);
            $zonas = Zona::all();
        }

        for ($i = 0; $i < 50; $i++) {
            Contacto::create([
                'zona_id' => $zonas->random()->id, // Asigna una zona aleatoria existente
                'nombre' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'telefono' => $faker->phoneNumber,
                'cargo' => $faker->jobTitle, // 'cargo' [cite: 23]
                'direccion' => $faker->address, // 'direccion' [cite: 24]
                'tipo_contacto' => $faker->randomElement(['principal', 'secundario', 'emergencia']), // 'tipo_contacto' [cite: 25]
            ]);
        }
    }
}