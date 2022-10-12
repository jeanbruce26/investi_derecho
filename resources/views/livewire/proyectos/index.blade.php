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
        <div class="card-body">
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
                        <th class="col-md-1"><strong>ID</strong></th>
                        <th class="col-md-4"><strong>TITULO</strong></th>
                        <th class="col-md-3"><strong>CATEGORIA</strong></th>
                        <th class="col-md-2"><strong>TIPO</strong></th>
                        <th class="col-md-1"><strong>PARTICIPANTES</strong></th>
                        <th class="col-md-1"><strong>ACCIONES</strong></th>
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
                                <td>{{ $item->proyecto_financiamiento }}</td>
                                <td>
                                    <a href="{{ route('participante.edit', $item->proyecto_id) }}" type="button"
                                        class="link-info fs-15"><i
                                            class="bx bx-user-plus bx-sm bx-burst-hover ms-4"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('proyecto.edit', $item->proyecto_id) }}" type="button"
                                        class="link-success fs-15"><i class="bx bx-edit bx-sm bx-burst-hover ms-4"></i></a>
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
</div>
