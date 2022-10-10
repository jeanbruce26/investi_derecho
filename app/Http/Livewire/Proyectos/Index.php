<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use Livewire\Component;

class Index extends Component
{
    public $buscar;

    public function render()
    {
        $proyecto = Proyecto::join('categoria_proyecto','proyecto.categoria_proyecto_id','=','categoria_proyecto.categoria_proyecto_id')->where('proyecto.proyecto_titulo','LIKE',"%{$this->buscar}%")->orWhere('categoria_proyecto.categoria_proyecto','LIKE',"%{$this->buscar}%")->orWhere('proyecto.proyecto_id','LIKE',"%{$this->buscar}%")->orWhere('proyecto.proyecto_financiamiento','LIKE',"%{$this->buscar}%")->orderBy('proyecto.proyecto_id','DESC')->paginate(10);
        return view('livewire.proyectos.index',[
            'proyecto' => $proyecto,
        ]);
    }
}
