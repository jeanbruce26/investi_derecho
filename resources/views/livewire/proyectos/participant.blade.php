<div>
    <div class="card">
        <div class="card-body">
            <div class="">
                <form wire:submit.prevent="crearParticipante">
                    <div class="mb-3 row">
                        <label class="col-md-3  col-form-label">Persona <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control @error('persona') is-invalid  @enderror" wire:model="persona" list="datalistOptions" type="text"
                                placeholder="Ingrese el Nombre de la Persona a buscar...">
                            <datalist id="datalistOptions">
                                <select class="form-control @error('persona') is-invalid  @enderror" wire:model="persona">
                                @foreach ($personas as $item)
                                <option value="{{ $item->persona_nombres }}">{{ $item->persona_apellidos }}</option>
                                @endforeach
                                </select>
                            </datalist>
                            @error('persona')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Participante <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <select wire:model="participante"
                                class="form-select @error('participante') is-invalid  @enderror">
                                <option value="" selected>Seleccione</option>
                                @foreach ($participantes as $item)
                                    <option value="{{ $item->participante_proyecto_id }}">
                                        {{ $item->participante_proyecto }}</option>
                                @endforeach
                            </select>
                            @error('participante')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($persona_docente == 1)
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Categoria Docente</label>
                            <div class="col-md-9">
                                <select wire:model="categoria_docente"
                                    class="form-select @error('categoria_docente') is-invalid  @enderror">
                                    <option value="" selected>Seleccione</option>
                                    @foreach ($categoria_docentes as $item)
                                        <option value="{{ $item->categoria_docente_id }}">
                                            {{ $item->categoria_docente }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categoria_docente')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if ($proyecto_investigacion == true)
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Categoria Docente Investigación</label>
                            <div class="col-md-9">
                                <select wire:model="categoria_investigacion"
                                    class="form-select @error('categoria_investigacion') is-invalid  @enderror">
                                    <option value="" selected>Seleccione</option>
                                    @foreach ($categoria_docente_investigacion as $item)
                                        <option value="{{ $item->categoria_investigacion_id }}">
                                            {{ $item->categoria_investigacion }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_investigacion')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="mt-4 row">
                        <div class="d-flex justify-content-between alig-items-center">
                            {{-- <a href="{{route('proyecto.index')}}" class="btn btn-secondary fw-bold" style="width: 120px">Regresar</a> --}}
                            <button class="btn btn-secondary fw-bold" wire:click="limpiar()" style="width: 120px"
                                type="button">Cancelar</button>
                            <button class="btn btn-primary fw-bold" style="width: 120px"
                                type="submit">{{ $button }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-border-left alert-dismissible fade shadow show" role="alert">
            <i class="ri-check-double-line me-3 align-middle"></i> <strong> {{ session('message') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table id="tablaPersonaProyecto" class="table table-bordered dt-responsive nowrap text-dark"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th><strong>ID</strong></th>
                        <th><strong>Nombre</strong></th>
                        <th><strong>Participante</strong></th>
                        <th><strong>Categoria Docente</strong></th>
                        @if ($proyecto_investigacion == true)
                            <th><strong>Categoria Docente Investigador</strong></th>
                        @endif
                        <th><strong>Acciones</strong></th>
                    </tr>
                </thead>
                @php $num = 1; @endphp
                <tbody>
                    @foreach ($persona_proyecto as $item)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $item->persona->persona_nombres }}, {{ $item->persona->persona_apellidos }}</td>
                            <td>{{ $item->ParticipanteProyecto->participante_proyecto }}</td>
                            @if ($item->categoria_docente_id)
                                <td>{{ $item->CategoriaDocente->categoria_docente }}</td>
                            @else
                                <td>-</td>
                            @endif
                            @if ($proyecto_investigacion == true)
                                @if ($item->categoria_investigacion_id)
                                    <td>{{ $item->CategoriaDocenteInvestigacion->categoria_investigacion }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            @endif
                            <td>
                                <a wire:click="cargarDatos({{ $item->persona_proyecto_id }})" type="button"
                                    class="link-success fs-15"><i class="bx bx-edit bx-sm bx-burst-hover ms-4"></i></a>
                                <a wire:click="eliminar({{ $item->persona_proyecto_id }})" type="button"
                                    class="link-danger fs-15"><i class="bx bx-trash bx-sm bx-burst-hover ms-4"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @php $num = 1; @endphp
            </table>
            @if ($persona_proyecto_count <= 0)
                <div class="text-center">
                    <span>No hay datos</span>
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between alig-items-center">
                <a href="{{ route('proyecto.index') }}" class="btn btn-secondary fw-bold"
                    style="width: 120px">Regresar</a>
                <div></div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.38/dist/sweetalert2.all.min.js"></script>

    <script>
        window.addEventListener('delete', event => {
            // alert('Name updated to: ' + event.detail.id);
            Swal.fire({
                title: 'Estas seguro?',
                text: "Una vez eliminado no habrá vuelta atras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('proyectos.participant', 'deletePart', event.detail.id);
                    Swal.fire(
                        'Eliminado!',
                        'El participante ha sido eliminado.',
                        'success'
                    )
                }
            })
        })

        document.addEventListener('livewire:load', function() {
            $('.persona-select2').select2();
            $('.persona-select2').on('change', function() {
                @this.set('persona', this.value)
            })
        })

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush
