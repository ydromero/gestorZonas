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

    /**
     * Elimina un contacto de la base de datos.
     *
     * @param int $contactoId El ID del contacto a eliminar.
     * @return void
     */
    public function deleteContacto($contactoId)
    {
        try {
            $contacto = Contacto::findOrFail($contactoId); // Busca el contacto por su ID
            $nombreContactoEliminado = $contacto->nombre; // Captura el nombre antes de eliminar
            $contacto->delete(); // Elimina el contacto

            // Refrescar la lista de contactos para la zona actual
            // No necesitamos redirigir, Livewire actualizará la vista
            $this->resetPage(); // Vuelve a la primera página de contactos (si aplica)
            // Opcional: Re-emitir el evento para que la lista de zonas sepa que un contacto fue eliminado si fuera necesario
            // $this->emit('contactoEliminado');

            session()->flash('message', 'Contacto "' . $nombreContactoEliminado . '" eliminado exitosamente.');

        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el contacto: ' . $e->getMessage());
        }
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
