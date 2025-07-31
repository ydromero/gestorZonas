<div>
    {{-- Mensaje de éxito (opcional, si se redirige) --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- Mensaje de error (si hay alguno) --}}
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form wire:submit.prevent="save">
        {{-- Incluye los campos comunes del formulario de contacto --}}
        @include('contactos._form_fields')

        <div class="d-flex justify-content-end mt-4">
            {{-- Botón para cerrar el formulario (o cancelar) --}}
            <button type="button" class="btn btn-secondary mr-2" wire:click="$emit('contactoCreado')">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Contacto</button>
        </div>
    </form>
</div>