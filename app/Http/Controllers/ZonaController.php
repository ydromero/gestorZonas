<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{

    public function create()
    {
        return view('zonas.create');
    }

    public function edit(Zona $zona)
    {
        return view('zonas.edit', compact('zona'));
    }


    public function update(Request $request, Zona $zona)
    {
        // Lógica para actualizar una zona
    }

}
