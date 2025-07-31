<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination; // Importa el trait para la paginación
use App\Models\Zona; // Asegúrate de importar tu modelo Zona

class ListarZonas extends Component
{
    use WithPagination; // Usa el trait para la paginación

    protected $paginationTheme = 'bootstrap'; // Establece el tema de paginación

    public $zonaSeleccionadaId; // Propiedad para almacenar el ID de la zona seleccionada
    
    public function seleccionarZona($zonaId)
    {
        $this->zonaSeleccionadaId = $zonaId; // Actualiza la propiedad con el ID de la zona seleccionada
        $this->emit('mostrarContactos', $zonaId); // Re-emite el evento para el componente ListarContactosZona
    }

    public function render()
    {
        $zonas = Zona::paginate(5); // Obtiene las zonas paginadas  

        return view('livewire.listar-zonas', [
            'zonas' => $zonas,
        ]);
    }
}
