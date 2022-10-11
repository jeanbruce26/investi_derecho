@extends('administrador')

@section('titulo')
Dashboardd
@endsection

@section('sub-titulo')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item active text-white">Bienvenidos al <strong>Sistema de Registro de Proyectos de Investigación</strong></li>
    </ol>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')

<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="mb-2 text-dark">Docentes Investigadores</p>
                        <h4 class="mb-0">{{ $personaDocuenteCount }}</h4>
                    </div>
                    <div class="col-4">
                        <div class="text-end">
                            <div>
                                2.06 % <i class="mdi mdi-arrow-up text-success ms-1"></i>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 62%"
                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="mb-2 text-dark">Proyectos de investigación</p>
                        <h4 class="mb-0">{{ $proyectoInvestigacionCount }}</h4>
                    </div>
                    <div class="col-4">
                        <div class="text-end">
                            <div>
                                2.06 % <i class="mdi mdi-arrow-up text-success ms-1"></i>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 62%"
                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="mb-2 text-dark">Proyectos de Pregrado</p>
                        <h4 class="mb-0">{{ $proyectoPregradoCount }}</h4>
                    </div>
                    <div class="col-4">
                        <div class="text-end">
                            <div>
                                2.06 % <i class="mdi mdi-arrow-up text-success ms-1"></i>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 62%"
                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="mb-2 text-dark">Proyectos de Posgrado</p>
                        <h4 class="mb-0">{{ $proyectoPosgradoCount }}</h4>
                    </div>
                    <div class="col-4">
                        <div class="text-end">
                            <div>
                                2.06 % <i class="mdi mdi-arrow-up text-success ms-1"></i>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 62%"
                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Proyectos de Docentes</h4>

                <div class="table-responsive">
                    <table class="table table-centered text-dark" id="tablaDashboard">
                        <thead>
                            <tr>
                                <th scope="col">DOCENTE</th>
                                @foreach ($categoriaProyecto as $item)
                                    @if($item->categoria_proyecto_id == 1 || $item->categoria_proyecto_id == 2)
                                        <th scope="col" class="col-md-1">{{str_replace('PROYECTO TESIS ','',$item->categoria_proyecto)}} (ASESORIA)</th>
                                    @else
                                        <th scope="col" class="col-md-1">{{str_replace('PROYECTO INVESTIGACION ','',$item->categoria_proyecto)}}</th>
                                    @endif
                                @endforeach
                                {{-- <th scope="col">ACCIONES</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($persona as $item)
                            @php
                                $id = $item->persona_id;
                            @endphp
                                <tr>
                                    <td>
                                        <a href="#showModal" data-bs-toggle="modal" data-bs-target="#showModal{{$item->persona_id}}" class="text-dark"> {{ $item->persona_apellidos }},<br/> {{ $item->persona_nombres }} </a>

                                        {{-- Modal Show --}}
                                        <div class="modal fade" id="showModal{{$item->persona_id}}" tabindex="-1" aria-labelledby="showModal" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="showModalLabel">{{ $item->persona_apellidos }}, {{$item->persona_nombres}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-secondary d-flex justify-content-center align-items-center btn-x1" data-bs-dismiss="modal"> <i class=" ri-close-line me-1 ri-lg"></i>Cerrar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal Show --}}

                                    </td>
                                    @foreach ($categoriaProyecto as $item)
                                        @php
                                            $categoriaCount = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',$item->categoria_proyecto_id)->count('proyecto.categoria_proyecto_id');
                                        @endphp    
                                        
                                        <td> {{ $categoriaCount }} </td>
                                    @endforeach
                                    {{-- <td align="center"> 
                                        <a href="#showModal" type="button" class="d-flex align-items-center justify-content-center btn btn-primary btn-sm" style="width: 35px" data-bs-toggle="modal" data-bs-target="#showModal{{$item->persona_id}}"> <i class="bx bx-show bx-xs"></i></a> 
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script>
    $('#tablaDashboard').DataTable({
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