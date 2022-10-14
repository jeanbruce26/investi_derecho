<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\CategoriaProyecto;
use App\Models\Convocatoria;
use App\Models\Proyecto;
use App\Models\TipoFinanciamiento;
use Livewire\Component;

class Edit extends Component
{
    public $titulo;
    public $resumen;
    public $categoria;
    public $estado;
    public $financiamiento = false;
    public $tipo_financiamiento;
    public $monto_financiamiento;
    public $proyecto_id;
    public $convocatoria;
    public $fecha_inicio;
    public $fecha_fin;
    public $curso;
    public $semestre;

    public function mount()
    {
        $proyecto = Proyecto::find($this->proyecto_id);
        $this->titulo = $proyecto->proyecto_titulo;
        $this->resumen = $proyecto->proyecto_resumen;
        $this->categoria = $proyecto->categoria_proyecto_id;
        $this->estado = $proyecto->proyecto_estado;
        if($proyecto->proyecto_financiamiento == 'FINANCIADO'){
            $this->financiamiento = true;
        }else{
            $this->financiamiento = false;
        }
        $this->tipo_financiamiento = $proyecto->tipo_financiamiento_id;
        $this->monto_financiamiento = $proyecto->proyecto_monto;
        $this->convocatoria = $proyecto->convocatoria_id;
        $this->fecha_inicio = $proyecto->proyecto_fecha_presentacion;
        $this->fecha_fin = $proyecto->proyecto_fecha_fin;
        $this->curso = $proyecto->proyecto_curso;
        $this->semestre = $proyecto->proyecto_semestre;
    }

    public function updated($propertyName){
        if($this->financiamiento == false){
            $this->reset('tipo_financiamiento', 'monto_financiamiento');
        }else{
            $this->validateOnly($propertyName, [
                'tipo_financiamiento' => 'required|numeric',
                'monto_financiamiento' => 'required|numeric',
            ]);
        }

        $this->validateOnly($propertyName, [
            'titulo' => 'required|string',
            'resumen' => 'required|string',
            'categoria' => 'required|numeric',
            'estado' => 'required|string',
            'financiamiento' => 'nullable',
            'tipo_financiamiento' => 'nullable|numeric',
            'monto_financiamiento' => 'nullable|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'convocatoria' => 'required|numeric',
            'curso' => 'nullable|string',
            'semestre' => 'nullable|string',
        ]);

        // if($this->categoria != 7){
        //     $this->reset('curso','semestre');
        // }
    }

    public function actualizarProyecto()
    {
        // dd($this->all());

        if($this->financiamiento == false){
            $this->validate([
                'titulo' => 'required|string',
                'resumen' => 'required|string',
                'categoria' => 'required|numeric',
                'estado' => 'required|string',
                'financiamiento' => 'nullable',
                'tipo_financiamiento' => 'nullable|numeric',
                'monto_financiamiento' => 'nullable|numeric',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'nullable|date',
                'convocatoria' => 'required|numeric',
                'curso' => 'nullable|string',
                'semestre' => 'nullable|string',
            ]);
        }else{
            if($this->categoria == 7){
                $this->validate([
                    'titulo' => 'required|string',
                    'resumen' => 'required|string',
                    'categoria' => 'required|numeric',
                    'estado' => 'required|string',
                    'financiamiento' => 'nullable',
                    'fecha_inicio' => 'required|date',
                    'fecha_fin' => 'nullable|date',
                    'convocatoria' => 'required|numeric',
                    'tipo_financiamiento' => 'required|numeric',
                    'monto_financiamiento' => 'required|numeric',
                    'curso' => 'required|string',
                    'semestre' => 'required|string',
                ]);
            }else{
                $this->validate([
                    'titulo' => 'required|string',
                    'resumen' => 'required|string',
                    'categoria' => 'required|numeric',
                    'estado' => 'required|string',
                    'financiamiento' => 'nullable',
                    'fecha_inicio' => 'required|date',
                    'fecha_fin' => 'nullable|date',
                    'convocatoria' => 'required|numeric',
                    'tipo_financiamiento' => 'required|numeric',
                    'monto_financiamiento' => 'required|numeric',
                    'curso' => 'nullable|string',
                    'semestre' => 'nullable|string',
                ]);
            }
        }

        $proyecto = Proyecto::find($this->proyecto_id);
        $proyecto->proyecto_titulo = $this->titulo;
        $proyecto->proyecto_resumen = $this->resumen;
        $proyecto->proyecto_estado = $this->estado;
        $proyecto->categoria_proyecto_id = $this->categoria;
        if($this->financiamiento == true){
            $proyecto->proyecto_financiamiento = 'FINANCIADO';
            $proyecto->tipo_financiamiento_id = $this->tipo_financiamiento;
            $proyecto->proyecto_monto = $this->monto_financiamiento;
        }else{
            $proyecto->proyecto_financiamiento = 'NO FINANCIADO';
            $proyecto->tipo_financiamiento_id = $this->tipo_financiamiento;
            $proyecto->proyecto_monto = $this->monto_financiamiento;
        }
        if($this->categoria == 7){
            $proyecto->proyecto_curso = $this->curso;
            $proyecto->proyecto_semestre = str_replace(' ','',$this->semestre);
        }
        $proyecto->save();

        session()->flash('message', 'Datos del proyecto actualizado correctamente.');

        return redirect()->route('proyecto.index');
    }

    public function render()
    {
        $cate_proyect = CategoriaProyecto::all();
        $tipo_financi = TipoFinanciamiento::all();
        $convo = Convocatoria::all();

        return view('livewire.proyectos.edit', [
            'cate_proyect' => $cate_proyect,
            'tipo_financi' => $tipo_financi,
            'convo' => $convo,
        ]);
    }
}
