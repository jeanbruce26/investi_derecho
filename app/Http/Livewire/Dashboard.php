<?php

namespace App\Http\Livewire;

use App\Models\CategoriaProyecto;
use App\Models\Persona;
use App\Models\PersonaProyecto;
use App\Models\Proyecto;
use Livewire\Component;

class Dashboard extends Component
{
    public $buscar;
    public $persona_id;

    public function render()
    {
        $id = $this->persona_id;
        $search = $this->buscar;
        $proyecto = PersonaProyecto::join('proyecto','persona_proyecto.proyecto_id','=','proyecto.proyecto_id')->join('categoria_proyecto','proyecto.categoria_proyecto_id','=','categoria_proyecto.categoria_proyecto_id')->where(function($query) use ($id){$query->where('persona_proyecto.persona_id',$id);})->where(function($query) use ($search){$query->where('proyecto.proyecto_titulo','LIKE',"%{$search}%")->orWhere('categoria_proyecto.categoria_proyecto','LIKE',"%{$search}%")->orWhere('proyecto.proyecto_financiamiento','LIKE',"%{$search}%");})->orderBy('proyecto.proyecto_id','ASC')->paginate(10);

        return view('livewire.dashboard', [
            'proyecto' => $proyecto,
        ]);
    }
}
