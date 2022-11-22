<div>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('proyecto.create') }}" class="btn btn-primary d-flex justify-content-center align-items-center"
                style="width: 115px;">
                <strong>Agregar</strong> <i class='bx bx-add-to-queue fs-3 ms-2'></i>
            </a>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-border-left alert-dismissible fade shadow show" role="alert">
            <i class="ri-check-double-line me-3 align-middle"></i> <strong> {{ session('message') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-body table-responsive">
            <div class="mb-3 d-flex justify-content-end">
                <label class="col-md-1 col-form-label">Buscar: </label>
                <div class="col-md-3">
                    <input class="form-control" type="search" wire:model="buscar">
                </div>
            </div>
            <table id="" class="table table-bordered dt-responsive nowrap text-dark"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead style="background-color: rgb(228, 228, 228)">
                    <tr>
                        <th ><strong>ID</strong></th>
                        <th class="col-md-3"><strong>TITULO</strong></th>
                        <th class="col-md-2"><strong>CATEGORIA</strong></th>
                        <th class="col-md-2"><strong>LINEA</strong></th>
                        <th class="col-md-1"><strong>TIPO</strong></th>
                        <th colspan="2"><strong>PUBLICACIÓN</strong></th>
                        <th><strong>PARTICIPANTES</strong></th>
                        <th><strong>ACCIONES</strong></th>
                    </tr>
                </thead>

                <tbody role="row">
                    @if ($proyecto == null)
                        <tr>
                            <td colspan="7" align="center">Sin datos</td>
                        </tr>
                    @else
                        @foreach ($proyecto as $item)
                            <tr>
                                <td>{{ $item->proyecto_id }}</td>
                                <td>{{ $item->proyecto_titulo }}</td>
                                <td>{{ $item->CategoriaProyecto->categoria_proyecto }}</td>
                                @if($item->lineas_investigacion_id)
                                    @if($item->LineaInvestigacion->lineas_investigacion != null)
                                        <td>{{ $item->LineaInvestigacion->lineas_investigacion_subarea }} / {{ $item->LineaInvestigacion->lineas_investigacion }}</td>
                                    @else
                                        <td>{{ $item->LineaInvestigacion->lineas_investigacion_subarea }}</td>
                                    @endif
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $item->proyecto_financiamiento }}</td>
                                <td>
                                    @php
                                        $publicacion = App\Models\Publicacion::where('proyecto_id',$item->proyecto_id)->first();
                                        // dump($publicacion);
                                    @endphp
                                    @if ($publicacion == null)
                                    <span class="badge badge-soft-danger font-size-12">NO PUBLICADO</span>
                                    @else
                                    <span class="badge badge-soft-success font-size-12">PUBLICADO</span>
                                    @endif
                                </td>
                                <td align="center">
                                    <a href="#modalPuclicacion" type="button" class="link-warning fs-15" wire:click="cargarId({{$item->proyecto_id}})" data-bs-toggle="modal" data-bs-target="#modalPuclicacion">
                                        <i class='bx bx-book-bookmark bx-sm bx-burst-hover'></i>
                                    </a>
                                </td>
                                <td align="center">
                                    <a href="{{ route('participante.edit', $item->proyecto_id) }}" type="button"
                                        class="link-info fs-15"><i
                                            class="bx bx-user-plus bx-sm bx-burst-hover"></i></a>
                                </td>
                                <td align="center">
                                    <a href="{{ route('proyecto.edit', $item->proyecto_id) }}" type="button"
                                        class="link-success fs-15"><i class="bx bx-edit bx-sm bx-burst-hover"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if ($proyecto->count())
            <div>
                {{$proyecto->links()}}
            </div>
            @else
            <div class="text-center">
                <span>No hay resultados para la busqueda "{{$buscar}}"</span>
            </div>
            @endif
        </div>
    </div>
    {{-- Modal Editar --}}
    <div wire:ignore.self class="modal fade" id="modalPuclicacion" tabindex="-1" aria-labelledby="modalPuclicacion" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicar Proyecto</h5>
                    <button type="button" class="btn-close" wire:click="limpiar()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label" style="text-align: left;">Revista</label>
                            <div class="col-md-10" style="text-align: left;">
                                <input wire:model="revista" class="form-control @error('revista') is-invalid  @enderror" type="text" value="" placeholder="Ingrese la revista">
                                @error('revista') <span class="error" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label" style="text-align: left;">Link </label>
                            <div class="col-md-10" style="text-align: left;">
                                <input wire:model="link" class="form-control @error('link') is-invalid  @enderror" type="text" value="" placeholder="Ingrese el link de la revista">
                                @error('link') <span class="error" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label" style="text-align: left;">Categoria</label>
                            <div class="col-md-10" style="text-align: left;">
                                <select wire:model="categoria" class="form-select @error('categoria') is-invalid  @enderror" aria-label="Default select example">
                                    <option value="" selected>Seleccione</option>
                                    @foreach ($categoria_model as $item2)
                                    <option value="{{$item2->categoria_id}}">{{$item2->categoria}}</option>
                                    @endforeach
                                </select>
                                @error('categoria') <span class="error" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label" style="text-align: left;">Fecha <span class="text-danger">*</span></label>
                            <div class="col-md-10" style="text-align: left;">
                                <input wire:model="fecha" class="form-control @error('fecha') is-invalid  @enderror" type="date" value="">
                                @error('fecha') <span class="error" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer col-12 d-flex justify-content-between">
                        <a type="button" class="btn btn-secondary d-flex justify-content-center align-items-center btn-x1" wire:click="limpiar()" data-bs-dismiss="modal">Cancelar</a>
                        <button type="button" wire:click="publicacion()" class="btn btn-primary d-flex justify-content-center align-items-center btn-x1">{{$boton}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Editar --}}
</div>

@push('js')
<script>
    window.addEventListener('publicacionModal', event => {
        $('#modalPuclicacion').modal('hide');
    })
</script>
@endpush
