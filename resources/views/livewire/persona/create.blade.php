<div>
    <div class="">
        <form wire:submit.prevent="crearPersona">

            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Tipo de documento</label>
                <div class="col-md-9">
                    <select wire:model="tipo_documento" class="form-select @error('tipo_documento') is-invalid @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        @foreach ($tipo_doc as $item)
                        <option value="{{$item->tipo_documento_id}}">{{$item->tipo_documento}}</option>
                        @endforeach
                    </select>
                    @error('tipo_documento') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Número de documento</label>
                <div class="col-md-9">
                    <input wire:model="numero_documento" class="form-control @error('distrito_direccion') is-invalid  @enderror" type="text" value="" placeholder="Ingrese su número de documento">
                    @error('numero_documento') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Nombres <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input wire:model="nombres" class="form-control @error('nombres') is-invalid  @enderror" type="text" value="" placeholder="Ingrese su nombre" onkeyup="mayus(this);">
                    @error('nombres') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Apellidos <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input wire:model="apellidos" class="form-control @error('apellidos') is-invalid  @enderror" type="text" value="" placeholder="Ingrese su apellido" onkeyup="mayus(this);">
                    @error('apellidos') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Genero</label>
                <div class="col-md-9">
                    <select wire:model="genero" class="form-select @error('genero') is-invalid  @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        <option>MASCULINO</option>
                        <option>FEMENINO</option>
                    </select>
                    @error('genero') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Correo</label>
                <div class="col-md-9">
                    <input wire:model="correo" class="form-control @error('correo') is-invalid  @enderror" type="email" value="" placeholder="Ingrese su correo electronico">
                    @error('correo') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Numero de celular</label>
                <div class="col-md-9">
                    <input wire:model="celular" class="form-control @error('celular') is-invalid  @enderror" type="text" value="" placeholder="Ingrese su número de celular">
                    @error('celular') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Grado <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <select wire:model="grado_academico" class="form-select @error('grado_academico') is-invalid  @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        <option>BACHILLER</option>
                        <option>MAGISTER</option>
                        <option>DOCTOR</option>
                    </select>
                    @error('grado_academico') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Docente <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('docente') is-invalid  @enderror" type="checkbox" wire:model="docente">
                        @error('docente') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="d-flex justify-content-between alig-items-center">
                    <a href="{{route('persona.index')}}" class="btn btn-secondary fw-bold" style="width: 120px">Regresar</a>
                    <button class="btn btn-primary fw-bold" style="width: 120px" type="submit">Guardar</button>
                </div>
            </div>
            {{-- <div class="row">
                <label class="col-md-3  col-form-label">Persona</label>
                <div class="col-md-9">
                    <input class="form-control" list="datalistOptions" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                        <option value="San Francisco">Hola</option>
                        <option value="New York"></option>
                        <option value="Seattle"></option>
                        <option value="Los Angeles"></option>
                        <option value="Chicago"></option>
                        <option value="San Francisco"></option>
                        <option value="New York"></option>
                        <option value="Seattle"></option>
                        <option value="Los Angeles"></option>
                        <option value="Chicago"></option>
                        <option value="San Francisco"></option>
                        <option value="New York"></option>
                        <option value="Seattle"></option>
                        <option value="Los Angeles"></option>
                        <option value="Chicago"></option>
                        <option value="San Francisco"></option>
                        <option value="New York"></option>
                        <option value="Seattle"></option>
                        <option value="Los Angeles"></option>
                        <option value="Chicago"></option>
                        <option value="San Francisco"></option>
                        <option value="New York"></option>
                        <option value="Seattle"></option>
                        <option value="Los Angeles"></option>
                        <option value="Chicago"></option>
                    </datalist>
                </div>
            </div> --}}
        </form>
    </div>
</div>
@push('js')
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush
