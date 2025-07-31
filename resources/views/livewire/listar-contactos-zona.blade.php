<div>
    @if ($mostrarTabla)
        {{-- Contenedor para el título y el botón de crear contacto, visible solo si hay una zona seleccionada --}}
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h4 class="mb-0">Contactos de la Zona: {{ \App\Models\Zona::find($zonaId)->nombre ?? 'Cargando...' }}</h4>
            {{-- Botón para crear un nuevo contacto --}}
            <button type="button" class="btn btn-primary btn-sm" wire:click="$emit('openCreateContactoModal', {{ $zonaId }})">
                Crear Contacto
            </button>
        </div>

        {{-- Condicional para mostrar la tabla solo si hay contactos --}}
        @if ($contactos->isNotEmpty())
            <div class="table-responsive"> {{-- Contenedor responsivo para la tabla --}}
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
                        @foreach ($contactos as $contacto)
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
                                    <button class="btn btn-sm btn-danger"
                                            onclick="confirm('¿Estás seguro de que quieres eliminar a este contacto?') || event.stopImmediatePropagation()"
                                            wire:click="deleteContacto({{ $contacto->id }})">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $contactos->links() }}
            </div>
        @else
            {{-- Mensaje si no hay contactos --}}
            <p class="text-muted text-center">No hay contactos para esta zona.</p>
        @endif
    @else
        {{-- Mensaje si no hay zona seleccionada --}}
        <p class="text-muted text-center">Selecciona "Ver Contactos" en una zona para ver sus contactos.</p>
    @endif
</div>