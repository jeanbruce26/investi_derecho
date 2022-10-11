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
{{-- <div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Animated Progress</h4>
            <p class="card-title-desc">Add <code class="highlighter-rounge">.animated-progess</code>
                class with <code class="highlighter-rounge">.progress-bar</code> for animated
                progressbar.
            </p>

            <div class="">
                <div class="progress animated-progess mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress animated-progess mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress animated-progess mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress animated-progess">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-7">
                        <p class="mb-2 text-dark">Docentes Investigadores</p>
                    </div>
                    <div class="col-5">
                        <div class="text-end">
                            <h3 class="mb-0 text-danger">12{{ $personaDocuenteCount }}</h3>
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
                    <div class="col-7">
                        <p class="mb-2 text-dark">Proyectos de investigación</p>
                        
                    </div>
                    <div class="col-5">
                        <div class="text-end">
                            <h3 class="mb-0 text-danger">08{{ $proyectoInvestigacionCount }}</h3>
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
                    <div class="col-7">
                        <p class="mb-2 text-dark">Proyectos de Tesis de Pregrado</p>
                        
                    </div>
                    <div class="col-5">
                        <div class="text-end">
                            <h3 class="mb-0 text-danger">12{{ $proyectoPregradoCount }}</h3>
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
                    <div class="col-7">
                        <p class="mb-2 text-dark">Proyectos de Tesis de Posgrado</p>
                        
                    </div>
                    <div class="col-5">
                        <div class="text-end">
                            <h3 class="mb-0 text-danger">12{{ $proyectoPosgradoCount }}</h3>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($persona as $item)
                            @php
                                $id = $item->persona_id;
                            @endphp
                                <tr>
                                    <td>
                                        <a href="#showModal" data-bs-toggle="modal" data-bs-target="#showModal{{$item->persona_id}}" class="text-dark"> {{ $item->persona_apellidos }}, {{ $item->persona_nombres }} </a>

                                        {{-- Modal Show --}}
                                        <div class="modal fade" id="showModal{{$item->persona_id}}" tabindex="-1" aria-labelledby="showModal" aria-hidden="true">
                                            <div class="modal-dialog  modal-xl modal-dialog-scrollable">
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

                                        <td align="center">
                                            <div class="">
                                                <div class="fw-bold fs-5">{{ $categoriaCount }}</div>

                                                @if ($categoriaCount == 0)
                                                <div class="progress animated-progess">
                                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @endif

                                                @if ($categoriaCount > 0 && $categoriaCount <= 5)
                                                <div class="progress animated-progess">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @endif

                                                @if ($categoriaCount > 5 && $categoriaCount <= 10)
                                                <div class="progress animated-progess">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @endif

                                                @if ($categoriaCount > 10 && $categoriaCount <= 15)
                                                <div class="progress animated-progess">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @endif

                                                @if ($categoriaCount > 15 && $categoriaCount <= 20)
                                                <div class="progress animated-progess">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @endif

                                                @if ($categoriaCount > 20)
                                                <div class="progress animated-progess">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                    @endforeach
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
