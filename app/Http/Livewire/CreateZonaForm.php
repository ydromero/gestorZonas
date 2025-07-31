<?php

namespace App\Http\Livewire;

    use Livewire\Component;
    use App\Models\Zona; 

    class CreateZonaForm extends Component
    {
        // Propiedades públicas para los campos del formulario
        public $nombre;
        public $descripcion;
        public $codigo;
        public $ubicacion;
        public $responsable;
        public $telefono_responsable;
        public $estado = 'activa'; // Valor por defecto

        // Reglas de validación para los campos del formulario de creación
        protected $rules = [
            'nombre' => 'required|string|max:100|unique:zonas,nombre',
            'descripcion' => 'nullable|string',
            'codigo' => 'required|string|max:10|unique:zonas,codigo',
            'ubicacion' => 'nullable|string|max:255',
            'responsable' => 'required|string|max:100',
            'telefono_responsable' => 'required|string|max:15',
            'estado' => 'required|in:activa,inactiva',
        ];

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
            $this->estado = 'activa';
            $this->resetValidation();
        }

        // Método para guardar la nueva zona
        public function save()
        {
            $this->validate(); // Ejecuta las validaciones

            Zona::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'codigo' => $this->codigo,
                'ubicacion' => $this->ubicacion,
                'responsable' => $this->responsable,
                'telefono_responsable' => $this->telefono_responsable,
                'estado' => $this->estado,
            ]);

            session()->flash('message', 'Zona creada exitosamente.');

            // Redirige a la página principal de zonas después de guardar
            return redirect()->route('dashboard');
        }

        public function render()
        {
            return view('livewire.create-zona-form'); // Vista Blade para este componente
        }
    }
    