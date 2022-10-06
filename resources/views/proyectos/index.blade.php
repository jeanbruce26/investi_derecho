@extends('administrador')

@section('titulo')
Proyectos
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('proyecto.create')}}" class="btn btn-primary d-flex justify-content-center align-items-center" style="width: 115px;">
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
        <table id="tablaProyectos" class="table table-bordered dt-responsive nowrap text-dark"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th><strong>ID</strong></th>
                    <th class="col-2"><strong>Titulo</strong></th>
                    <th class="col-2"><strong>Resumen</strong></th>
                    <th class="col-2"><strong>Categoria</strong></th>
                    <th><strong>Tipo</strong></th>
                    <th class="col-1"><strong>Participantes</strong></th>
                    <th class="col-1"><strong>Acciones</strong></th>
                </tr>
            </thead>

            <tbody>
                @if ($proyecto==null)
                    <tr>
                        <td colspan="7" align="center">Sin datos</td>
                    </tr>
                @else
                    @foreach ($proyecto as $item)
                    <tr>
                        <td>{{$item->proyecto_id}}</td>
                        <td>{{Str::substr($item->proyecto_titulo, 0, 25)}}</td>
                        <td>{{Str::substr($item->proyecto_resumen, 0, 15)}}...</td>
                        <td>{{$item->CategoriaProyecto->categoria_proyecto}}</td>
                        @if ($item->proyecto_financiamiento == 1)
                        <td>FINANCIADO</td>
                        @else
                        <td>NO FINANCIADO</td>
                        @endif
                        <td>
                            <a href="{{route('participante.edit',$item->proyecto_id)}}" type="button" class="link-info fs-15"><i class="bx bx-user-plus bx-sm bx-burst-hover ms-4"></i></a>
                        </td>
                        <td>
                            <a href="{{route('proyecto.edit',$item->proyecto_id)}}" type="button" class="link-success fs-15"><i class="bx bx-edit bx-sm bx-burst-hover ms-4"></i></a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>
</div>
@endsection
@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script>
    $('#tablaProyectos').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por páginas",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "order": "desc",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            }
        }
    });
</script>
@endsection
