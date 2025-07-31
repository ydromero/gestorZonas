    @extends('layouts.app')

    @section('title', 'Crear Nueva Zona')

    @section('content')
        <div class="container mt-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5 mb-0">Crear Nueva Zona</h2>
                </div>
                <div class="card-body">
                    {{-- componente Livewire para el formulario de creación de zona --}}
                    @livewire('create-zona-form')
                </div>
            </div>
        </div>
    @endsection