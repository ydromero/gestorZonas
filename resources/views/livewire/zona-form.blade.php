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
            {{-- Campo Nombre --}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" wire:model.defer="nombre">
                @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Campo Descripción --}}
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" rows="3" wire:model.defer="descripcion"></textarea>
                @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Campo Código --}}
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" wire:model.defer="codigo">
                @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Campo Ubicación --}}
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" wire:model.defer="ubicacion">
                @error('ubicacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Campo Responsable --}}
            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input type="text" class="form-control @error('responsable') is-invalid @enderror" id="responsable" wire:model.defer="responsable">
                @error('responsable') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Campo Teléfono Responsable --}}
            <div class="form-group">
                <label for="telefono_responsable">Teléfono Responsable</label>
                <input type="text" class="form-control @error('telefono_responsable') is-invalid @enderror" id="telefono_responsable" wire:model.defer="telefono_responsable">
                @error('telefono_responsable') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Campo Estado --}}
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control @error('estado') is-invalid @enderror" id="estado" wire:model.defer="estado">
                    <option value="activa">Activa</option>
                    <option value="inactiva">Inactiva</option>
                </select>
                @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary mr-2">Cancelar</a>
                
            <button type="submit" class="btn btn-primary">
                {{ $zona ? 'Actualizar Zona' : 'Guardar Zona' }}
            </button>
            
            </div>
        </form>
    </div>