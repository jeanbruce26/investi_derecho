@extends('administrador')

@section('titulo')
    Dashboard
@endsection

@section('sub-titulo')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item active text-white">Bienvenidos al <strong>Sistema de Registro de Proyectos de
                    Investigación</strong></li>
        </ol>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <figure class="highcharts-figure">
                <div id="reporteProyecto">
                </div>
            </figure>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="">
                            <p class="mb-2 text-dark">Docentes Investigadores</p>
                        </div>
                        <div class="">
                            <div class="">
                                <h3 class="ms-3 text-danger">{{ $personaDocuenteCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="">
                            <p class="mb-2 text-dark">Proyectos de investigación</p>
                        </div>
                        <div class="">
                            <div class="">
                                <h3 class="ms-3 text-danger">{{ $proyectoInvestigacionCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="">
                            <p class="mb-2 text-dark">Proyectos de Tesis de Pregrado</p>
                        </div>
                        <div class="">
                            <div class="">
                                <h3 class="ms-3 text-danger">{{ $proyectoPregradoCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="">
                            <p class="mb-2 text-dark">Proyectos de Tesis de Posgrado</p>
                        </div>
                        <div class="">
                            <div class="">
                                <h3 class="ms-3 text-danger">{{ $proyectoPosgradoCount }}</h3>
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
                    <h4 class="card-title mb-4 text-uppercase">Proyectos de Docentes</h4>

                    <div class="table-responsive">
                        <table class="table table-centered text-dark" id="tablaDashboard" data-page-length='100'>
                            <thead style="background-color: rgb(228, 228, 228)">
                                <tr>
                                    <th scope="col" class="text-center">DOCENTES</th>
                                    @foreach ($categoriaProyecto as $item)
                                        @if ($item->categoria_proyecto_id == 1 || $item->categoria_proyecto_id == 2)
                                            <th scope="col" class="col-md-1 text-center">
                                                {{ str_replace('PROYECTO TESIS ', '', $item->categoria_proyecto) }}
                                                (ASESORIA)
                                            </th>
                                        @else
                                            <th scope="col" class="col-md-1 text-center">
                                                {{ str_replace('PROYECTO INVESTIGACION ', '', $item->categoria_proyecto) }}
                                            </th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persona as $item)
                                    @php
                                        $id = $item->persona_id;
                                    @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ route('reporte', $item->persona_id) }}" class="text-dark">
                                                <p class="nombre">{{ $item->persona_apellidos }},
                                                    {{ $item->persona_nombres }}</p>
                                            </a>
                                        </td>
                                        @foreach ($categoriaProyecto as $item)
                                            @php
                                                $categoriaCount = App\Models\PersonaProyecto::join('proyecto', 'persona_proyecto.proyecto_id', '=', 'proyecto.proyecto_id')
                                                    ->where('persona_proyecto.persona_id', $id)
                                                    ->where('proyecto.categoria_proyecto_id', $item->categoria_proyecto_id)
                                                    ->count('proyecto.categoria_proyecto_id');
                                            @endphp

                                            <td align="center">
                                                <div class="">
                                                    <div class="fw-bold fs-5">{{ $categoriaCount }}</div>

                                                    @if ($categoriaCount == 0)
                                                        <div class="progress animated-progess">
                                                            <div class="progress-bar bg-dark" role="progressbar"
                                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                    @if ($categoriaCount > 0 && $categoriaCount <= 5)
                                                        <div class="progress animated-progess">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                    @if ($categoriaCount > 5 && $categoriaCount <= 10)
                                                        <div class="progress animated-progess">
                                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                                style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                    @if ($categoriaCount > 10 && $categoriaCount <= 15)
                                                        <div class="progress animated-progess">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                    @if ($categoriaCount > 15 && $categoriaCount <= 20)
                                                        <div class="progress animated-progess">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                    @if ($categoriaCount > 20)
                                                        <div class="progress animated-progess">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
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
    <script>
        $('#tablaDashboard').DataTable({
            autoWidth: true,
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var cDataPro = '<?php echo $dataProyecto; ?>';
        const datosPro = JSON.parse(cDataPro);
        console.log(datosPro);
        const nombrePro = datosPro.map(data => data.label);
        const cantidadPro = datosPro.map(data => data.data);

        Highcharts.chart('reporteProyecto', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'REPORTE DE CANTIDAD DE PROYECTOS POR DOCENTE'
            },
            xAxis: {
                categories: nombrePro,
                crosshair: true
            },
            yAxis: {
                title: {
                    useHTML: true,
                    text: 'Cantidad'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            colors: ['#e52e37', '#e55f2e', '#e5b72e', '#e5e52e', '#4ae52e', '#2ee587', '#2ee5c7', '#2ecde5', '#2ea8e5', '#2e6ee5', '#2e34e5', '#622ee5'
            ],
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                },
                series: {
                    colorByPoint: true
                }
            },
            series: [{
                name: 'Cantidad de Proyectos',
                data: cantidadPro
            }]
        });
    </script>
@endsection
