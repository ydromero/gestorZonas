@extends('layouts.app')
@section('title', 'Gestor de Zonas')
@section('content')

    <h1 class="my-4 text-center">Gestión de Zonas y Contactos</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">Listado de Zonas</h2>
            <a href="{{ route('zonas.create') }}" class="btn btn-warning btn-sm">Crear Zona</a>
        </div>
        <div class="card-body">
            
            @livewire('listar-zonas')
        </div>
    </div>

    <div class="card shadow-lg mb-4">
        <div class="card-header bg-success text-white">
            <h2 class="h5 mb-0">Gestión de Contactos</h2>
        </div>
        <div class="card-body">
            @livewire('listar-contactos-zona')
        </div>
    </div>

@endsection