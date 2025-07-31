@extends('layouts.app')
@section('title', 'Entorno de Pruebas')
@section('content')

    <h1 class="my-4 text-center">Página de Pruebas</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0">Contenido de Pruebas</h2>
        </div>
        <div class="card-body">
            <p>Esta es una página de pruebas para verificar el funcionamiento de Livewire.</p>
            <button type="button" class="btn btn-success btn-sm" wire:click="$emit('openCreateZonaModal')">Crear Zona</button>
            @livewire('crear-zona-form')
        </div>
    </div>

@endsection