<div>
    @if ($mostrarTabla)
        <h4 class="mt-4 mb-3">Contactos de la Zona: {{ \App\Models\Zona::find($zonaId)->nombre ?? 'Cargando...' }}</h4>
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Cargo</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->id }}</td>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td>{{ $contacto->cargo }}</td>
                        <td>
                            <span class="badge badge-{{
                                $contacto->tipo_contacto == 'principal' ? 'primary' :
                                ($contacto->tipo_contacto == 'secundario' ? 'info' : 'warning')
                            }}">
                                {{ ucfirst($contacto->tipo_contacto) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info mr-1">Editar</button>
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay contactos para esta zona.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $contactos->links() }}
        </div>
    @else
        <p class="text-muted text-center">Selecciona "Ver Contactos" en una zona para ver sus contactos.</p>
    @endif
</div>