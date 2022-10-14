<div>
    <div class="card">
        <div class="card-body table-responsive">
            <div class="mb-4 mt-2 row">
                <div class="col-8">
                    <h4 class="mt-2 text-uppercase fw-bold ms-1" style="text-decoration-line: underline;">Reporte de Proyectos</h4>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <label class="col-md-3 col-form-label">Buscar: </label>
                    <div class="col-md-9">
                        <input class="form-control" type="search" wire:model="buscar">
                    </div>
                </div>
            </div>
            <table class="table table-bordered dt-responsive nowrap text-dark"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead style="background-color: rgb(228, 228, 228)" class="text-center">
                    <tr>
                        <th><strong>NRO</strong></th>
                        <th class="col-md-5"><strong>TITULO</strong></th>
                        <th><strong>CATEGORIA</strong></th>
                        <th><strong>TIPO</strong></th>
                    </tr>
                </thead>

                @php
                    $num = 1;
                @endphp

                <tbody role="row">
                    @if ($proyecto == null)
                        <tr>
                            <td colspan="4" align="center">Sin datos</td>
                        </tr>
                    @else
                        @foreach ($proyecto as $item)
                            <tr>
                                <td align="center">{{ $num++ }}</td>
                                <td>{{ $item->Proyecto->proyecto_titulo }}</td>
                                <td>{{ $item->Proyecto->CategoriaProyecto->categoria_proyecto }}</td>
                                <td>{{ $item->Proyecto->proyecto_financiamiento }}</td>
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
