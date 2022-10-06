<?php

namespace App\Http\Livewire\Persona;

use App\Models\Persona;
use App\Models\TipoDocumento;
use Livewire\Component;

class Create extends Component
{
    public $tipo_documento;
    public $numero_documento;
    public $nombres;
    public $apellidos;
    public $genero;
    public $correo;
    public $celular;
    public $grado_academico;
    public $docente = false;

    public function updated($propertyName)
    {
        if($this->tipo_documento == 1){
            $this->validateOnly($propertyName, [
                'tipo_documento' => 'required|numeric',
                'numero_documento' => 'required|digits:8',
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
                'tipo_documento' => 'required|numeric',
                'numero_documento' => 'required|digits:9',
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

    public function crearPersona()
    {
        // dd($this->all());

        if($this->tipo_documento == 1){
            $this->validate([
                'tipo_documento' => 'required|numeric',
                'numero_documento' => 'required|digits:8|unique:persona,persona_numero_documento',
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
                'tipo_documento' => 'required|numeric',
                'numero_documento' => 'required|digits:9|unique:persona,persona_numero_documento',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'genero' => 'nullable|string',
                'correo' => 'nullable|email',
                'celular' => 'nullable|numeric|digits:9',
                'grado_academico' => 'nullable|string',
                'docente' => 'nullable',
            ]);
        }

        $persona = Persona::create([
            "tipo_documento_id" => $this->tipo_documento,
            "persona_numero_documento" => $this->numero_documento,
            "persona_nombres" => $this->nombres,
            "persona_apellidos" => $this->apellidos,
            "persona_sexo" => $this->genero,
            "persona_correo" => $this->correo,
            "persona_celular" => $this->celular,
            "persona_grado" => $this->grado_academico,
        ]);

        $persona = Persona::find($persona->persona_id);
        if($this->docente == true){
            $persona->persona_docente = 1;
        }else{
            $persona->persona_docente = 2;
        }
        $persona->save();

        session()->flash('message', 'Datos de la persona registrada correctamente.');

        return redirect()->route('persona.index');
    }

    public function render()
    {
        $tipo_doc = TipoDocumento::all();
        return view('livewire.persona.create', [
            'tipo_doc' => $tipo_doc,

        ]);
    }
}
