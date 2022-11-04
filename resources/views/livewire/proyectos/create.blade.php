<div>
    <div class="">
        <form wire:submit.prevent="crearProyecto">
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Titulo <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input wire:model="titulo" class="form-control @error('titulo') is-invalid  @enderror" type="text" value="" placeholder="Ingrese el titulo del proyecto">
                    @error('titulo') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Resumen </label>
                <div class="col-md-9">
                    <textarea wire:model="resumen" class="form-control @error('resumen') is-invalid  @enderror" placeholder="Ingrese el resumen del proyecto." style="height: 100px;"></textarea>
                    @error('resumen') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Convocatoria <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <select wire:model="convocatoria" class="form-select @error('convocatoria') is-invalid  @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        @foreach ($convo as $item)
                        <option value="{{$item->convocatoria_id}}">{{$item->convocatoria}}</option>
                        @endforeach
                    </select>
                    @error('convocatoria') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Categoria <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <select wire:model="categoria" class="form-select @error('categoria') is-invalid  @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        @foreach ($cate_proyect as $item)
                        <option value="{{$item->categoria_proyecto_id}}">{{$item->categoria_proyecto}}</option>
                        @endforeach
                    </select>
                    @error('categoria') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            @if($categoria == 3)
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Nombre del Semillero<span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input wire:model="semillero" class="form-control @error('semillero') is-invalid  @enderror" type="text" value="" placeholder="Ingrese el nombre del Semillero">
                    @error('semillero') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif
            @if ($categoria == 7)
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Curso <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input wire:model="curso" class="form-control @error('curso') is-invalid  @enderror" type="text" value="" placeholder="Ingrese el nombre del curso">
                    @error('curso') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Semestre <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input wire:model="semestre" class="form-control @error('semestre') is-invalid  @enderror" type="text" value="" onkeyup="mayus(this);" placeholder="Ingrese el semestre, por ejemplo: '2009-I', '2020-II'">
                    @error('semestre') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Linea de investigación </label>
                <div class="col-md-9">
                    <select wire:model="linea_investigacion" class="form-select @error('linea_investigacion') is-invalid  @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        @foreach ($lineas as $item)
                        <option value="{{$item->lineas_investigacion_id}}">{{$item->lineas_investigacion}}</option>
                        @endforeach
                    </select>
                    </select>
                    @error('linea_investigacion') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Estado <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <select wire:model="estado" class="form-select @error('estado') is-invalid  @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        <option value="PROCESO">PROCESO</option>
                        <option value="CULMINADO">CULMINADO</option>
                    </select>
                    @error('estado') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Fecha presentación <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input wire:model="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid  @enderror" type="date" value="">
                    @error('fecha_inicio') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Fecha final</label>
                <div class="col-md-9">
                    <input wire:model="fecha_fin" class="form-control @error('fecha_fin') is-invalid  @enderror" type="date" value="">
                    @error('fecha_fin') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Financiamiento <span class="text-danger">*</span></label>
                <div class="col-md-9 d-flex align-items-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('financiamiento') is-invalid  @enderror" type="checkbox" wire:model="financiamiento">
                        @error('financiamiento') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @if ($financiamiento == true)
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Tipo de financiamiento <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <select wire:model="tipo_financiamiento" class="form-select @error('tipo_financiamiento') is-invalid  @enderror" aria-label="Default select example">
                        <option value="" selected>Seleccione</option>
                        @foreach ($tipo_financi as $item)
                        <option value="{{$item->tipo_financiamiento_id}}">{{$item->tipo_financiamiento}}</option>
                        @endforeach
                    </select>
                    @error('tipo_financiamiento') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Mondo de financiamiento </label>
                <div class="col-md-9">
                    <input wire:model="monto_financiamiento" class="form-control @error('monto_financiamiento') is-invalid  @enderror" type="number" value="" placeholder="Ingrese el monto del financiamiento">
                    @error('monto_financiamiento') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif
            <div class="mt-4 row">
                <div class="d-flex justify-content-between alig-items-center">
                    <a href="{{route('proyecto.index')}}" class="btn btn-secondary fw-bold" style="width: 120px">Regresar</a>
                    <button class="btn btn-primary fw-bold" style="width: 120px" type="submit">Guardar</button>
                </div>
            </div>
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
