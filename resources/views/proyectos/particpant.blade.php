@extends('administrador')

@section('titulo')
Participantes / {{Str::substr($proyecto->proyecto_titulo, 0, 40) }}... / {{$proyecto->CategoriaProyecto->categoria_proyecto }}
@endsection

@section('content')
@livewire('proyectos.participant', ['proyecto_id' => $proyecto_id])
@endsection
