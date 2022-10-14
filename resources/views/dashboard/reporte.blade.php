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

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{route('administrador')}}" class="btn btn-secondary fw-bold me-4" style="width: 120px">Regresar</a>
            <h4 class="fw-bold mt-2 text-center" style="text-decoration-line: underline;">{{$per->persona_apellidos}}, {{$per->persona_nombres}}</h4>
            <div style="width: 120px"></div>
        </div>
    </div>
</div>
<div class="row g-3">
    @if (json_decode($data1)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report1">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
    @if (json_decode($data2)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report2">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
    @if (json_decode($data3)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report3">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
    @if (json_decode($data4)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report4">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
    @if (json_decode($data5)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report5">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
    @if (json_decode($data6)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report6">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
    @if (json_decode($data7)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report7">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
    @if (json_decode($data8)[0]->data != 0)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="report8">
                    </div>
                </figure>
            </div>
        </div>
    </div>
    @endif
</div>

@livewire('dashboard', ['persona_id' => $persona_id])

@endsection

@section('javascript')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    var cData1 = '<?php echo $data1;?>';
    var valor1 = <?php echo json_decode($data1)[0]->data?>;
    console.log(valor1);
    const datos1 = JSON.parse(cData1);
    console.log(datos1);
    const nombre1 = datos1.map(data => data.label);
    const cantidad1 = datos1.map(data => data.data);

    var cData2 = '<?php echo $data2;?>';
    var valor2 = <?php echo json_decode($data2)[0]->data?>;
    console.log(valor2);
    const datos2 = JSON.parse(cData2);
    console.log(datos2);
    const nombre2 = datos2.map(data => data.label);
    const cantidad2 = datos2.map(data => data.data);

    var cData3 = '<?php echo $data3;?>';
    var valor3 = <?php echo json_decode($data3)[0]->data?>;
    console.log(valor3);
    const datos3 = JSON.parse(cData3);
    console.log(datos3);
    const nombre3 = datos3.map(data => data.label);
    const cantidad3 = datos3.map(data => data.data);

    var cData4 = '<?php echo $data4;?>';
    var valor4 = <?php echo json_decode($data4)[0]->data?>;
    console.log(valor4);
    const datos4 = JSON.parse(cData4);
    console.log(datos4);
    const nombre4 = datos4.map(data => data.label);
    const cantidad4 = datos4.map(data => data.data);

    var cData5 = '<?php echo $data5;?>';
    var valor5 = <?php echo json_decode($data5)[0]->data?>;
    console.log(valor5);
    const datos5 = JSON.parse(cData5);
    console.log(datos5);
    const nombre5 = datos5.map(data => data.label);
    const cantidad5 = datos5.map(data => data.data);

    var cData6 = '<?php echo $data6;?>';
    var valor6 = <?php echo json_decode($data6)[0]->data?>;
    console.log(valor6);
    const datos6 = JSON.parse(cData6);
    console.log(datos6);
    const nombre6 = datos6.map(data => data.label);
    const cantidad6 = datos6.map(data => data.data);

    var cData7 = '<?php echo $data7;?>';
    var valor7 = <?php echo json_decode($data7)[0]->data?>;
    console.log(valor7);
    const datos7 = JSON.parse(cData7);
    console.log(datos7);
    const nombre7 = datos7.map(data => data.label);
    const cantidad7 = datos7.map(data => data.data);

    var cData8 = '<?php echo $data8;?>';
    var valor8 = <?php echo json_decode($data8)[0]->data?>;
    console.log(valor8);
    const datos8 = JSON.parse(cData8);
    console.log(datos8);
    const nombre8 = datos8.map(data => data.label);
    const cantidad8 = datos8.map(data => data.data);

    if(valor1 > 0)
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

    if(valor2 > 0)
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

    if(valor3 > 0)
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

    if(valor4 > 0)
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

    if(valor5 > 0)
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

    if(valor6 > 0)
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

    if(valor7 > 0)
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

    if(valor8 > 0)
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
