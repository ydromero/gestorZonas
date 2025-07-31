<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'zona_id',
        'nombre',
        'email',
        'telefono',
        'cargo',
        'direccion',
        'tipo_contacto',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }
}
