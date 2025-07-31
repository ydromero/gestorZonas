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

    /**
     * Elimina una zona de la base de datos.
     *
     * @param int $zonaId El ID de la zona a eliminar.
     * @return void
     */
    public function deleteZona($zonaId)
    {
        try {
            $zona = Zona::findOrFail($zonaId); // Busca la zona por su ID
            $zona->delete(); // Elimina la zona 

            // Limpiar la zona seleccionada si es la que se eliminó
            if ($this->zonaSeleccionadaId == $zonaId) {
                $this->zonaSeleccionadaId = null;
                $this->emit('mostrarContactos', null); // Oculta la tabla de contactos si la zona eliminada estaba seleccionada
            }

            session()->flash('message', $zona->nombre . ' eliminada exitosamente.'); // Mensaje de éxito
            $this->gotoPage(1); // Opcional: Ir a la primera página después de eliminar
            // $this->resetPage(); // También podrías usar esto para refrescar la paginación

        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar la zona: ' . $e->getMessage()); // Mensaje de error
        }
    }

    public function render()
    {
        $zonas = Zona::paginate(5); // Obtiene las zonas paginadas  

        return view('livewire.listar-zonas', [
            'zonas' => $zonas,
        ]);
    }
}
