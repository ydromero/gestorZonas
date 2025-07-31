<div>
    <table class="table  table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Responsable</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zonas as $zona)
                <tr class="{{ $zona->id == $zonaSeleccionadaId ? 'table-active' : '' }}">
                    <td>{{ $zona->id }}</td>
                    <td>{{ $zona->nombre }}</td>
                    <td>{{ $zona->codigo }}</td>
                    <td>{{ $zona->responsable }}</td>
                    <td>
                        <span class="badge badge-{{ $zona->estado == 'activa' ? 'success' : 'danger' }}">
                            {{ $zona->estado }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('zonas.edit', $zona->id) }}" class="btn btn-sm btn-info mr-1">Editar</a>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                        <button wire:click="seleccionarZona({{ $zona->id }})" class="btn btn-sm btn-secondary ml-1">Ver Contactos</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $zonas->links() }} {{-- Paginación de Laravel --}}
    </div>
    
</div>
