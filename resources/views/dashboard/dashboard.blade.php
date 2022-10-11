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


{{-- <div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-tag-plus-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Nuevos Proyectos</div>
                    </div>
                </div>
                <h4 class="mt-4">{{ $proyectoCount }}</h4>
                <div class="row">
                    <div class="">
                        <p ></p>
                    </div>
                    <div class="">
                        <div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Personas</div>
                    </div>
                </div>
                <h4 class="mt-4">{{ $personaCount }}</h4>
                <div class="row">
                    <div class="">
                        <p ></p>
                    </div>
                    <div class="">
                        <div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Sales Report</h4>

                <div id="line-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Revenue</h4>

                <div id="column-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row --> --}}

<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Proyectos de Docentes</h4>

                <div class="table-responsive">
                    <table class="table table-centered text-dark">
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
                                <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($persona as $item)
                            @php
                                $id = $item->persona_id;

                                // $personaProyecto = App\Models\PersonaProyecto::join('persona','persona_proyecto.persona_id','=','persona.persona_id')->join('proyecto','persona_proyecto.proyecto_id', '=', 'proyecto.proyecto_id')->where('persona_proyecto.persona_id', $id)->orderBy('persona.persona_id','DESC')->first();

                                $categoriaCount1 = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',1)->count('proyecto.categoria_proyecto_id');

                                $categoriaCount2 = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',2)->count('proyecto.categoria_proyecto_id');

                                $categoriaCount3 = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',3)->count('proyecto.categoria_proyecto_id');

                                $categoriaCount4 = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',4)->count('proyecto.categoria_proyecto_id');

                                $categoriaCount5 = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',5)->count('proyecto.categoria_proyecto_id');

                                $categoriaCount6 = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',6)->count('proyecto.categoria_proyecto_id');

                                $categoriaCount7 = App\Models\PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->where('persona_proyecto.persona_id',$id)->where('proyecto.categoria_proyecto_id',7)->count('proyecto.categoria_proyecto_id');

                                // dd($categoriaCount);
                            @endphp
                                <tr>
                                    <td>{{ $item->persona_apellidos }}, {{ $item->persona_nombres }}</td>
                                    <td> {{ $categoriaCount1 }} </td>
                                    <td> {{ $categoriaCount2 }} </td>
                                    <td> {{ $categoriaCount3 }} </td>
                                    <td> {{ $categoriaCount4 }} </td>
                                    <td> {{ $categoriaCount5 }} </td>
                                    <td> {{ $categoriaCount6 }} </td>
                                    <td> {{ $categoriaCount7 }} </td>
                                    <td class="d-flex justify-content-center align-items-center"> <a href="#" class="d-flex align-items-center btn btn-primary btn-sm"> <i class="bx bx-show"></i></a> </td>
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