<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Zona;
use App\Models\Contacto;
use Livewire\WithPagination;


class ListarContactosZona extends Component
{
    use WithPagination;

    public $zonaId; // Propiedad para almacenar el ID de la zona seleccionada
    public $mostrarTabla = false; // Controla la visibilidad de la tabla de contactos
    protected $paginationTheme = 'bootstrap'; // Estilos de paginación para Bootstrap 4

    protected $listeners = ['mostrarContactos' => 'cargarContactos'];

    public function cargarContactos($zonaId)
    {
        $this->zonaId = $zonaId;
        $this->mostrarTabla = true;
        $this->resetPage(); // Reinicia la paginación al cargar nuevos contactos
    }

    public function render()
    {
        $contactos = collect(); // Inicializa la colección de contactos

        if($this->mostrarTabla && $this->zonaId) {
            $zona = Zona::find($this->zonaId);
            if ($zona) {
                $contactos = $zona->contactos()->paginate(10); // Obtiene los contactos de la zona seleccionada
            }
        }


        return view('livewire.listar-contactos-zona', [
            'contactos' => $contactos,
        ]);
    }
}
