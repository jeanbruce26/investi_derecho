<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\CategoriaDocente;
use App\Models\CategoriaDocenteInvestigacion;
use App\Models\CategoriaProyecto;
use App\Models\LineaInvestigacion;
use App\Models\ParticipanteProyecto;
use App\Models\Persona;
use App\Models\PersonaProyecto;
use App\Models\Proyecto;
use Livewire\Component;

class Participant extends Component
{
    public $proyecto_id;
    public $persona;
    public $persona_docente;
    public $participante;
    public $categoria_docente;
    public $categoria_investigacion;
    public $proyecto_investigacion = false;
    public $persona_proyecto;
    public $persona_proyecto_id;
    public $button = 'Agregar';
    public $participantes;

    protected $listeners = ['render', 'deletePart'];

    public function mount($proyecto_id)
    {
        $proyecto = Proyecto::where('proyecto_id',$proyecto_id)->first();
        // dd($proyecto);
        if($proyecto->categoria_proyecto_id == 1 || $proyecto->categoria_proyecto_id == 2){
            $this->proyecto_investigacion = false;

            $this->participantes = ParticipanteProyecto::where('participante_proyecto_estado',1)->get();
        }else{
            $this->proyecto_investigacion = true;
            if($proyecto->categoria_proyecto_id == 8){
                $this->participantes = ParticipanteProyecto::where('participante_proyecto_estado',2)->where('participante_categoria',8)->get();
            }else{
                $this->participantes = ParticipanteProyecto::where('participante_proyecto_estado',2)->get();
            }

        }
    }

    public function updated($propertyName)
    {
        if($this->persona){
            $persona_modelo = Persona::where('persona_nombres',$this->persona)->first();
            if($persona_modelo ==  null){
                $this->persona_docente = 0;
            }else{
                $this->persona_docente = $persona_modelo->persona_docente;
            }

            if($this->persona_docente == 1){
            }else{
                $this->reset('categoria_docente');
            }
        }

        $this->validateOnly($propertyName, [
            'persona' => 'required|string',
            'participante' => 'required|numeric',
            'categoria_docente' => 'nullable|numeric',
            'categoria_investigacion' => 'nullable|numeric',
        ]);
    }

    public function cargarDatos($persona_proyecto_id)
    {
        $this->persona_proyecto_id = $persona_proyecto_id;
        $per_pro = PersonaProyecto::where('persona_proyecto_id', $persona_proyecto_id)->first();
        // dd($per_pro);
        $this->persona = $per_pro->persona_id;
        $this->persona = $per_pro->Persona->persona_nombres;
        $this->participante = $per_pro->participante_proyecto_id;
        $this->categoria_docente = $per_pro->categoria_docente_id;
        $this->categoria_investigacion = $per_pro->categoria_investigacion_id;

        $this->persona_docente = $per_pro->Persona->persona_docente;
        $this->button = 'Guardar';
    }

    public function limpiar()
    {
        $this->reset('persona','categoria_docente','participante','categoria_investigacion');
        $this->persona_docente = 0;
        $this->persona_proyecto_id = null;
        $this->button = 'Agregar';
    }

    public function crearParticipante()
    {
        // dd($this->all());

        $per_id = Persona::where('persona_nombres',$this->persona)->first();

        $this->validate([
            'persona' => 'required|string',
            'participante' => 'required|numeric',
            'categoria_docente' => 'nullable|numeric',
            'categoria_investigacion' => 'nullable|numeric',
        ]);

        $per_count = PersonaProyecto::where('persona_proyecto_id',$this->persona_proyecto_id)->count();
        // dd($per_count);

        if($per_count == 0){
            PersonaProyecto::create([
                "persona_id" => $per_id->persona_id,
                "proyecto_id" => $this->proyecto_id,
                "participante_proyecto_id" => $this->participante,
                "categoria_investigacion_id" => $this->categoria_investigacion,
                "categoria_docente_id" => $this->categoria_docente,
            ]);

            session()->flash('message', 'Datos del participante agregado correctamente.');
        }else{
            $perso = PersonaProyecto::where('persona_proyecto_id',$this->persona_proyecto_id)->first();
            $perso->persona_id = $per_id->persona_id;
            $perso->participante_proyecto_id = $this->participante;
            $perso->categoria_investigacion_id = $this->categoria_investigacion;
            $perso->categoria_docente_id = $this->categoria_docente;
            $perso->save();

            session()->flash('message', 'Datos del participante actualizados correctamente.');
        }

        $this->persona_proyecto_id = null;

        return redirect()->route('participante.edit', $this->proyecto_id);
    }

    public function eliminar($id)
    {
        // dd($id);
        // $this->emit('delete');
        $this->dispatchBrowserEvent('delete', ['id' => $id]);
    }

    public function deletePart(PersonaProyecto $id)
    {
        $id->delete();
    }

    public function render()
    {
        $personas = Persona::all();
        // $participantes = ParticipanteProyecto::all();
        $categoria_docente_investigacion = CategoriaDocenteInvestigacion::all();
        $categoria_docentes = CategoriaDocente::all();
        $this->persona_proyecto = PersonaProyecto::where('proyecto_id', $this->proyecto_id)->get();
        $persona_proyecto_count = PersonaProyecto::where('proyecto_id', $this->proyecto_id)->count();
        // dd($persona_proyecto_count);

        return view('livewire.proyectos.participant',[
            'personas' => $personas,
            // 'participantes' => $participantes,
            'categoria_docente_investigacion' => $categoria_docente_investigacion,
            'categoria_docentes' => $categoria_docentes,
            'persona_proyecto_count' => $persona_proyecto_count
        ]);
    }
}
