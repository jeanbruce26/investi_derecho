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
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="fw-bold">{{$per->persona_apellidos}}, {{$per->persona_nombres}}</h4>
    </div>
</div>
<div class="row g-3">
    {{-- {{dump(json_decode($data1)[0]->data)}}
    @if (json_decode($data1)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report1">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif
    {{dump(json_decode($data2)[0]->data)}}
    @if (json_decode($data2)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report2">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif
    {{dump(json_decode($data3)[0]->data)}}
    @if (json_decode($data3)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report3">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif
    {{dump(json_decode($data4)[0]->data)}}
    @if (json_decode($data4)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report4">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif
    {{dump(json_decode($data5)[0]->data)}}
    @if (json_decode($data5)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report5">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif
    {{dump(json_decode($data6)[0]->data)}}
    @if (json_decode($data6)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report6">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif
    {{dump(json_decode($data7)[0]->data)}}
    @if (json_decode($data7)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report7">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif --}}
    {{-- {{dump(json_decode($data8)[0]->data)}}
    @if (json_decode($data8)[0]->data != 0) --}}
    <div class="col-6">
        <div class="card">
            <figure class="highcharts-figure">
                <div id="report8">
                </div>
            </figure>
        </div>
    </div>
    {{-- @endif --}}
</div>

<div>
    {{-- TU PARTE BECHITO --}}
</div>
@endsection

@section('javascript')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
</script> --}}

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    var cData1 = '<?php echo $data1;?>';
    const datos1 = JSON.parse(cData1);
    console.log(datos1);
    const nombre1 = datos1.map(data => data.label);
    const cantidad1 = datos1.map(data => data.data);

    var cData2 = '<?php echo $data2;?>';
    const datos2 = JSON.parse(cData2);
    console.log(datos2);
    const nombre2 = datos2.map(data => data.label);
    const cantidad2 = datos2.map(data => data.data);

    var cData3 = '<?php echo $data3;?>';
    const datos3 = JSON.parse(cData3);
    console.log(datos3);
    const nombre3 = datos3.map(data => data.label);
    const cantidad3 = datos3.map(data => data.data);

    var cData4 = '<?php echo $data4;?>';
    const datos4 = JSON.parse(cData4);
    console.log(datos4);
    const nombre4 = datos4.map(data => data.label);
    const cantidad4 = datos4.map(data => data.data);

    var cData5 = '<?php echo $data5;?>';
    const datos5 = JSON.parse(cData5);
    console.log(datos5);
    const nombre5 = datos5.map(data => data.label);
    const cantidad5 = datos5.map(data => data.data);

    var cData6 = '<?php echo $data6;?>';
    const datos6 = JSON.parse(cData6);
    const nombre6 = datos6.map(data => data.label);
    const cantidad6 = datos6.map(data => data.data);

    var cData7 = '<?php echo $data7;?>';
    const datos7 = JSON.parse(cData7);
    const nombre7 = datos7.map(data => data.label);
    const cantidad7 = datos7.map(data => data.data);

    var cData8 = '<?php echo $data8;?>';
    const datos8 = JSON.parse(cData8);
    const nombre8 = datos8.map(data => data.label);
    const cantidad8 = datos8.map(data => data.data);

    Highcharts.chart('report1', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[0];?>'
        },
        xAxis: {
            categories: nombre1,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad1
        }]
    });

    Highcharts.chart('report2', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[1];?>'
        },
        xAxis: {
            categories: nombre2,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad2
        }]
    });

    Highcharts.chart('report3', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[2];?>'
        },
        xAxis: {
            categories: nombre3,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad3
        }]
    });

    Highcharts.chart('report4', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[3];?>'
        },
        xAxis: {
            categories: nombre4,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad4
        }]
    });

    Highcharts.chart('report5', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[4];?>'
        },
        xAxis: {
            categories: nombre5,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad5
        }]
    });

    Highcharts.chart('report6', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[5];?>'
        },
        xAxis: {
            categories: nombre6,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad6
        }]
    });

    Highcharts.chart('report7', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[6];?>'
        },
        xAxis: {
            categories: nombre7,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad7
        }]
    });

    Highcharts.chart('report8', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $categoria[7];?>'
        },
        xAxis: {
            categories: nombre8,
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
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad de Proyectos por Convocatoria',
            data: cantidad8
        }]
    });
</script>
@endsection