@extends('administrador')

@section('titulo')
Editar Persona
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @livewire('persona.edit', ['persona_id' => $persona_id])
        {{-- <a href="{{route('persona.create')}}" class="btn btn-primary d-flex justify-content-center align-items-center" style="width: 45px;">
            <i class='bx bx-add-to-queue fs-3'></i>
        </a> --}}
    </div>
</div>
@endsection
