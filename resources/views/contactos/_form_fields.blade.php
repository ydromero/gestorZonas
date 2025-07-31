    {{-- Campo Nombre --}}
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" wire:model.defer="nombre">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Campo Email --}}
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model.defer="email">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Campo Teléfono --}}
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" wire:model.defer="telefono">
        @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Campo Cargo --}}
    <div class="form-group">
        <label for="cargo">Cargo</label>
        <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" wire:model.defer="cargo">
        @error('cargo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Campo Dirección --}}
    <div class="form-group">
        <label for="direccion">Dirección (Opcional)</label>
        <textarea class="form-control @error('direccion') is-invalid @enderror" id="direccion" rows="3" wire:model.defer="direccion"></textarea>
        @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Campo Tipo de Contacto --}}
    <div class="form-group">
        <label for="tipo_contacto">Tipo de Contacto</label>
        <select class="form-control @error('tipo_contacto') is-invalid @enderror" id="tipo_contacto" wire:model.defer="tipo_contacto">
            <option value="">Seleccione un tipo</option>
            <option value="principal">Principal</option>
            <option value="secundario">Secundario</option>
            <option value="emergencia">Emergencia</option>
        </select>
        @error('tipo_contacto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    