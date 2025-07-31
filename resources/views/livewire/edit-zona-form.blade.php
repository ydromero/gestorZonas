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

    <form wire:submit.prevent="save">
        @include('zonas._form_fields') {{-- Incluye los campos comunes --}}

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary mr-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Zona</button>
        </div>
    </form>
</div>
