<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'ubicacion',
        'responsable',
        'telefono_responsable',
        'estado',
    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'zona_id');
    }

}
