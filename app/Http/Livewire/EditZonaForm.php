<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Zona; // Importa tu modelo Zona
use Illuminate\Validation\Rule; // Importa Rule para validaciones únicas condicionales

class EditZonaForm extends Component
{
    // Propiedad para almacenar el ID de la zona que estamos editando
    public $zonaId;

    // Propiedades públicas para los campos del formulario
    public $nombre;
    public $descripcion;
    public $codigo;
    public $ubicacion;
    public $responsable;
    public $telefono_responsable;
    public $estado; // No le damos valor por defecto aquí, se cargará de la zona

    /**
     * Método que se ejecuta al inicializar el componente.
     * Recibe el ID de la zona a editar y carga sus datos.
     *
     * @param int $zonaId El ID de la zona a editar.
     * @return void
     */
    public function mount($zonaId)
    {
        $this->zonaId = $zonaId;
        // Carga la zona por ID. Si no existe, Livewire lanzará un 404.
        $zona = Zona::findOrFail($zonaId);

        // Rellena las propiedades del componente con los datos de la zona
        $this->nombre = $zona->nombre;
        $this->descripcion = $zona->descripcion;
        $this->codigo = $zona->codigo;
        $this->ubicacion = $zona->ubicacion;
        $this->responsable = $zona->responsable;
        $this->telefono_responsable = $zona->telefono_responsable;
        $this->estado = $zona->estado;
    }

    /**
     * Define las reglas de validación para los campos del formulario.
     * Las reglas 'unique' se ajustan para ignorar la zona actual que se está editando.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:100',
                // Ignora el nombre de la zona actual al validar unicidad
                Rule::unique('zonas', 'nombre')->ignore($this->zonaId),
            ],
            'descripcion' => 'nullable|string',
            'codigo' => [
                'required',
                'string',
                'max:10',
                // Ignora el código de la zona actual al validar unicidad
                Rule::unique('zonas', 'codigo')->ignore($this->zonaId),
            ],
            'ubicacion' => 'nullable|string|max:255',
            'responsable' => 'required|string|max:100',
            'telefono_responsable' => 'required|string|max:15',
            'estado' => 'required|in:activa,inactiva',
        ];
    }

    /**
     * Método para actualizar la zona existente.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $this->validate(); // Ejecuta las validaciones

        // Carga la zona nuevamente para asegurar que tenemos la instancia correcta
        $zona = Zona::findOrFail($this->zonaId);

        $zona->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'codigo' => $this->codigo,
            'ubicacion' => $this->ubicacion,
            'responsable' => $this->responsable,
                'telefono_responsable' => $this->telefono_responsable,
                'estado' => $this->estado,
            ]);

            session()->flash('message', 'Zona actualizada exitosamente.');

            // Redirige a la página principal de zonas después de actualizar
            return redirect()->route('dashboard');
        }

        /**
         * Renderiza la vista del componente.
         *
         * @return \Illuminate\View\View
         */
        public function render()
        {
            return view('livewire.edit-zona-form'); // Vista Blade para el formulario de edición
        }
    }