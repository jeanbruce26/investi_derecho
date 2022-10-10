<?php

namespace App\Http\Livewire\Persona;

use App\Models\Persona;
use App\Models\TipoDocumento;
use Livewire\Component;

class Edit extends Component
{
    public $persona_id;
    public $tipo_documento;
    public $numero_documento;
    public $nombres;
    public $apellidos;
    public $genero;
    public $correo;
    public $celular;
    public $grado_academico;
    public $docente;

    public function mount()
    {
        $persona = Persona::find($this->persona_id);
        $this->tipo_documento = $persona->tipo_documento_id;
        $this->numero_documento = $persona->persona_numero_documento;
        $this->nombres = $persona->persona_nombres;
        $this->apellidos = $persona->persona_apellidos;
        $this->genero = $persona->persona_sexo;
        $this->correo = $persona->persona_correo;
        $this->celular = $persona->persona_celular;
        $this->grado_academico = $persona->persona_grado;
        if($persona->persona_docente == 1){
            $this->docente = true;
        }else{
            $this->docente = false;
        }
    }

    public function updated($propertyName)
    {
        if($this->tipo_documento == 1){
            $this->validateOnly($propertyName, [
                'tipo_documento' => 'nullable|numeric',
                'numero_documento' => 'nullable|digits:8',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'genero' => 'nullable|string',
                'correo' => 'nullable|email',
                'celular' => 'nullable|numeric|digits:9',
                'grado_academico' => 'nullable|string',
                'docente' => 'nullable',
            ]);
        }else{
            $this->validateOnly($propertyName, [
                'tipo_documento' => 'nullable|numeric',
                'numero_documento' => 'nullable|digits:9',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'genero' => 'nullable|string',
                'correo' => 'nullable|email',
                'celular' => 'nullable|numeric|digits:9',
                'grado_academico' => 'nullable|string',
                'docente' => 'nullable',
            ]);
        }
    }

    public function actualizarPersona()
    {
        // dd($this->all());

        if($this->tipo_documento == 1){
            $this->validate([
                'tipo_documento' => 'nullable|numeric',
                'numero_documento' => 'nullable|digits:8',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'genero' => 'nullable|string',
                'correo' => 'nullable|email',
                'celular' => 'nullable|numeric|digits:9',
                'grado_academico' => 'nullable|string',
                'docente' => 'nullable',
            ]);
        }else{
            $this->validate([
                'tipo_documento' => 'nullable|numeric',
                'numero_documento' => 'nullable|digits:9',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'genero' => 'nullable|string',
                'correo' => 'nullable|email',
                'celular' => 'nullable|numeric|digits:9',
                'grado_academico' => 'nullable|string',
                'docente' => 'nullable',
            ]);
        }

        $persona = Persona::find($this->persona_id);
        $persona->tipo_documento_id = $this->tipo_documento;
        $persona->persona_numero_documento = $this->numero_documento;
        $persona->persona_nombres = $this->nombres;
        $persona->persona_apellidos = $this->apellidos;
        $persona->persona_sexo = $this->genero;
        $persona->persona_correo = $this->correo;
        $persona->persona_celular = $this->celular;
        $persona->persona_grado = $this->grado_academico;
        if($this->docente == true){
            $persona->persona_docente = 1;
        }else{
            $persona->persona_docente = 2;
        }
        $persona->save();

        session()->flash('message', 'Datos de la persona actualizada correctamente.');

        return redirect()->route('persona.index');
    }

    public function render()
    {
        $tipo_doc = TipoDocumento::all();
        return view('livewire.persona.edit', [
            'tipo_doc' => $tipo_doc,

        ]);
    }
}
