<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonaSeeder extends Seeder
{
    public function run(): void
    {
        Zona::create([
            'nombre' => 'Zona Central',
            'descripcion' => 'Zona estratégica de negocios.',
            'codigo' => 'ZC-001',
            'ubicacion' => 'Centro de la ciudad',
            'responsable' => 'Juan Pérez',
            'telefono_responsable' => '3101234567',
            'estado' => 'activa',
        ]);
        Zona::create([
            'nombre' => 'Zona Norte',
            'descripcion' => 'Principal zona residencial y comercial del norte.',
            'codigo' => 'ZN-002',
            'ubicacion' => 'Norte de la ciudad',
            'responsable' => 'Maria López',
            'telefono_responsable' => '3112345678',
            'estado' => 'activa',
        ]);
        Zona::create([
            'nombre' => 'Zona Sur',
            'descripcion' => 'Zona industrial con alto crecimiento.',
            'codigo' => 'ZS-003',
            'ubicacion' => 'Sur de la ciudad',
            'responsable' => 'Pedro Gómez',
            'telefono_responsable' => '3123456789',
            'estado' => 'activa',
        ]);
        Zona::create([
            'nombre' => 'Zona Occidente',
            'descripcion' => 'Zona de desarrollo urbano y recreación.',
            'codigo' => 'ZO-004',
            'ubicacion' => 'Occidente de la ciudad',
            'responsable' => 'Ana Rodríguez',
            'telefono_responsable' => '3134567890',
            'estado' => 'activa',
        ]);
        Zona::create([
            'nombre' => 'Zona Oriente',
            'descripcion' => 'Área de innovación tecnológica.',
            'codigo' => 'ZO-005',
            'ubicacion' => 'Oriente de la ciudad',
            'responsable' => 'Carlos Sánchez',
            'telefono_responsable' => '3145678901',
            'estado' => 'inactiva',
        ]);
        Zona::create([
            'nombre' => 'Zona Financiera',
            'descripcion' => 'Concentración de bancos y empresas.',
            'codigo' => 'ZF-006',
            'ubicacion' => 'Distrito financiero',
            'responsable' => 'Laura García',
            'telefono_responsable' => '3156789012',
            'estado' => 'activa',
        ]);
        Zona::create([
            'nombre' => 'Zona Turística',
            'descripcion' => 'Principal destino para visitantes.',
            'codigo' => 'ZT-007',
            'ubicacion' => 'Casco histórico',
            'responsable' => 'Diego Fernández',
            'telefono_responsable' => '3167890123',
            'estado' => 'activa',
        ]);
        Zona::create([
            'nombre' => 'Zona Universitaria',
            'descripcion' => 'Área con múltiples universidades.',
            'codigo' => 'ZU-008',
            'ubicacion' => 'Ciudad universitaria',
            'responsable' => 'Sofía Díaz',
            'telefono_responsable' => '3178901234',
            'estado' => 'activa',
        ]);
        Zona::create([
            'nombre' => 'Zona Rural',
            'descripcion' => 'Área con actividades agrícolas y ganaderas.',
            'codigo' => 'ZR-009',
            'ubicacion' => 'Afueras de la ciudad',
            'responsable' => 'Martín Ruiz',
            'telefono_responsable' => '3189012345',
            'estado' => 'inactiva',
        ]);
        Zona::create([
            'nombre' => 'Zona Logística',
            'descripcion' => 'Centro de distribución y almacenamiento.',
            'codigo' => 'ZL-010',
            'ubicacion' => 'Parque logístico',
            'responsable' => 'Valeria Castro',
            'telefono_responsable' => '3190123456',
            'estado' => 'activa',
        ]);
    }
}
