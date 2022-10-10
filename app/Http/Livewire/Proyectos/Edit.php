<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\CategoriaProyecto;
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
            'estado' => 'required|numeric',
            'financiamiento' => 'nullable',
            'tipo_financiamiento' => 'nullable|numeric',
            'monto_financiamiento' => 'nullable|numeric',
        ]);
    }

    public function actualizarProyecto()
    {
        // dd($this->all());

        $this->validate([
            'titulo' => 'required|string',
            'resumen' => 'required|string',
            'categoria' => 'required|numeric',
            'estado' => 'required|numeric',
            'financiamiento' => 'nullable',
            'tipo_financiamiento' => 'nullable|numeric',
            'monto_financiamiento' => 'nullable|numeric',
        ]);

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
        $proyecto->save();

        session()->flash('message', 'Datos del proyecto actualizado correctamente.');

        return redirect()->route('proyecto.index');
    }

    public function render()
    {
        $cate_proyect = CategoriaProyecto::all();
        $tipo_financi = TipoFinanciamiento::all();

        return view('livewire.proyectos.edit', [
            'cate_proyect' => $cate_proyect,
            'tipo_financi' => $tipo_financi,

        ]);
    }
}
