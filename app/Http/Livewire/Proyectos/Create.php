<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\CategoriaProyecto;
use App\Models\Convocatoria;
use App\Models\Proyecto;
use App\Models\TipoFinanciamiento;
use Livewire\Component;

class Create extends Component
{
    public $titulo;
    public $resumen;
    public $categoria;
    public $estado;
    public $financiamiento = false;
    public $tipo_financiamiento;
    public $monto_financiamiento;
    public $convocatoria;
    public $fecha_inicio;
    public $fecha_fin;

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
        ]);
    }

    public function crearProyecto()
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
            ]);
        }

        $proyecto = Proyecto::create([
            "proyecto_titulo" => $this->titulo,
            "proyecto_resumen" => $this->resumen,
            "proyecto_estado" => $this->estado,
            "categoria_proyecto_id" => $this->categoria,
            "proyecto_fecha_presentacion" => $this->fecha_inicio,
            "proyecto_fecha_fin" => $this->fecha_fin,
            "convocatoria_id" => $this->convocatoria,
        ]);

        $proyecto = Proyecto::find($proyecto->proyecto_id);
        if($this->financiamiento == true){
            $proyecto->proyecto_financiamiento = 'FINANCIADO';
            $proyecto->tipo_financiamiento_id = $this->tipo_financiamiento;
            $proyecto->proyecto_monto = $this->monto_financiamiento;
        }else{
            $proyecto->proyecto_financiamiento = 'NO FINANCIADO';
        }
        $proyecto->save();

        session()->flash('message', 'Datos del proyecto registrado correctamente.');

        return redirect()->route('proyecto.index');
    }

    public function render()
    {
        $cate_proyect = CategoriaProyecto::all();
        $tipo_financi = TipoFinanciamiento::all();
        $convo = Convocatoria::all();

        return view('livewire.proyectos.create', [
            'cate_proyect' => $cate_proyect,
            'tipo_financi' => $tipo_financi,
            'convo' => $convo,
        ]);
    }
}
