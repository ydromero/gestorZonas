<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contacto; // Importa tu modelo Contacto
use Illuminate\Validation\Rule; // Importa Rule para validaciones únicas condicionales

class CreateContactoForm extends Component
{
    // Propiedad para almacenar el ID de la zona a la que se asociará el contacto
    public $zonaId;

    // Propiedades públicas para los campos del formulario de contacto
    public $nombre;
    public $email;
    public $telefono;
    public $cargo;
    public $direccion;
    public $tipo_contacto = ''; // Valor por defecto, vacío para que el select pida selección

    // Escuchar el evento 'openCreateContactoModal'
    protected $listeners = ['openCreateContactoModal' => 'mount'];

    /**
     * Método que se ejecuta al inicializar el componente o al recibir el evento.
     * Recibe el ID de la zona para asociar el nuevo contacto.
     *
     * @param int|null $zonaId
     * @return void
     */
    public function mount($zonaId = null)
    {
        $this->zonaId = $zonaId;
        $this->resetForm(); // Limpia los campos al iniciar o al abrir el formulario
    }

    /**
     * Define las reglas de validación para los campos del formulario de creación de contacto.
     * La regla 'unique' para el email se ajusta para ser única solo dentro de la misma zona.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                // El email debe ser único para la zona específica
                Rule::unique('contactos')->where(function ($query) {
                    return $query->where('zona_id', $this->zonaId);
                }),
            ],
            'telefono' => 'required|string|max:15',
            'cargo' => 'required|string|max:50',
            'direccion' => 'nullable|string|max:255',
            'tipo_contacto' => 'required|in:principal,secundario,emergencia',
            'zonaId' => 'required|exists:zonas,id', // Asegura que la zonaId exista
        ];
    }

    /**
     * Método para resetear los campos del formulario y los errores de validación.
     *
     * @return void
     */
    public function resetForm()
    {
        $this->reset([
            'nombre',
            'email',
            'telefono',
            'cargo',
            'direccion',
            'tipo_contacto',
        ]);
        $this->tipo_contacto = ''; // Resetear el select a la opción vacía
        $this->resetValidation(); // Limpia los errores de validación
    }

    /**
     * Método para guardar el nuevo contacto.
     *
     * @return void
     */
    public function save()
    {
        $this->validate(); // Ejecuta las validaciones

        Contacto::create([
            'zona_id' => $this->zonaId,
            'nombre' => $this->nombre,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'cargo' => $this->cargo,
            'direccion' => $this->direccion,
            'tipo_contacto' => $this->tipo_contacto,
        ]);

        session()->flash('message', 'Contacto "' . $this->nombre . '" creado exitosamente.');

        // Emitir un evento para refrescar la lista de contactos en ListarContactosZona
        $this->emit('contactoCreado');
        $this->resetForm(); // Limpia el formulario después de guardar
        // Opcional: Podrías redirigir a la vista de contactos de la zona si fuera una página separada
        // return redirect()->route('contactos.index', ['zona' => $this->zonaId]);
    }

    /**
     * Renderiza la vista del componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.create-contacto-form');
    }
}