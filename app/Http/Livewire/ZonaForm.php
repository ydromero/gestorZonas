<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Zona; 
use Illuminate\Validation\Rule;

class ZonaForm extends Component
{
 
    // Cambiamos a almacenar solo el ID de la zona (será null para creación)
    public $zonaId;
    
    // Propiedades públicas para los campos del formulario
    public $nombre;
    public $descripcion;
    public $codigo;
    public $ubicacion;
    public $responsable;
    public $telefono_responsable;
    public $estado = 'activa'; // Valor por defecto

    /**
     * Método que se ejecuta al inicializar el componente.
     * Si se pasa una instancia de Zona, se rellenan las propiedades del formulario.
     */

    public function mount(?Zona $zona = null)
    {
        if ($zonaId) {
            $this->zonaId = $zonaId;
            // Carga la zona por ID. Si no existe, Livewire lanzará un 404.
            $zona = Zona::findOrFail($zonaId);
            
            $this->nombre = $zona->nombre;
            $this->descripcion = $zona->descripcion;
            $this->codigo = $zona->codigo;
            $this->ubicacion = $zona->ubicacion;
            $this->responsable = $zona->responsable;
            $this->telefono_responsable = $zona->telefono_responsable;
            $this->estado = $zona->estado;
        }
    }

    /**
     * Define las reglas de validación para los campos del formulario.
     * Las reglas 'unique' se ajustan para ignorar la zona actual si estamos editando.
     */

    protected function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:100',
                Rule::unique('zonas')->ignore($this->zona ? $this->zona->id : null),
            ],
            'descripcion' => 'nullable|string',
            'codigo' => [
                'required',
                'string',
                'max:10',
                Rule::unique('zonas')->ignore($this->zona ? $this->zona->id : null),
            ],
            'ubicacion' => 'nullable|string|max:255',
            'responsable' => 'required|string|max:100',
            'telefono_responsable' => 'required|string|max:15',
            'estado' => 'required|in:activa,inactiva',
        ];
    }

    // Método para resetear los campos del formulario y los errores de validación
    public function resetForm()
    {
        $this->reset([
            'nombre',
            'descripcion',
            'codigo',
            'ubicacion',
            'responsable',
            'telefono_responsable',
            'estado',
        ]);
        $this->estado = 'activa'; // Restablecer el valor por defecto
        $this->resetValidation(); // Limpia los errores de validación
    }

    // Método para guardar la nueva zona
    public function save()
    {
        $this->validate(); // Ejecuta las validaciones

        $data = [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'codigo' => $this->codigo,
            'ubicacion' => $this->ubicacion,
            'responsable' => $this->responsable,
            'telefono_responsable' => $this->telefono_responsable,
            'estado' => $this->estado,
        ];

        if ($this->zonaId) {
            // Si zonaId existe, estamos editando
            $zona = Zona::findOrFail($this->zonaId); // Carga la zona nuevamente para asegurar la instancia
            $zona->update($data);
            session()->flash('message', 'Zona actualizada exitosamente.');
        } else {
            // Si zonaId es nulo, estamos creando una nueva zona
            Zona::create($data);
            session()->flash('message', 'Zona creada exitosamente.');
        }
            
        // Redirige a la página principal de zonas después de guardar/actualizar
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.zona-form'); // Esta es la vista Blade para el formulario
    }
}
    