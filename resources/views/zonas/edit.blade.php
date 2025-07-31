@extends('layouts.app')

@section('title', 'Editar Zona')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                {{-- Mantenemos el nombre de la zona para el título --}}
                <h2 class="h5 mb-0">Editar Zona: {{ $zona->nombre }}</h2>
            </div>
            <div class="card-body">
                {{-- Incluimos el componente Livewire para editar la zona --}}
                @livewire('edit-zona-form', ['zonaId' => $zona->id])
            </div>
        </div>
    </div>
@endsection