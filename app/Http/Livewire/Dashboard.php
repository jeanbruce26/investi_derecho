<?php

namespace App\Http\Livewire;

use App\Models\CategoriaProyecto;
use App\Models\Persona;
use App\Models\PersonaProyecto;
use App\Models\Proyecto;
use Livewire\Component;

class Dashboard extends Component
{
    // public $data1;
    // public $data2;
    // public $data3;
    // public $data4;
    // public $data5;
    // public $data6;
    // public $data7;
    // public $data8;
    // public $reporte;

    
    public function render()
    {
        $proyectoInvestigacionCount = Proyecto::where('categoria_proyecto_id', '!=', 1)->where('categoria_proyecto_id', '!=', 2)->count();
        $proyectoPregradoCount = Proyecto::where('categoria_proyecto_id', 1)->count();
        $proyectoPosgradoCount = Proyecto::where('categoria_proyecto_id', 2)->count();
        $personaDocuenteCount = Persona::where('persona_docente', 1)->count();
        $persona = Persona::where('persona_docente', 1)->get();
        $proyecto = Proyecto::all();
        $categoriaProyecto = CategoriaProyecto::all();

        return view('livewire.dashboard', [
            'proyectoInvestigacionCount' => $proyectoInvestigacionCount,
            'personaDocuenteCount' => $personaDocuenteCount,
            'persona' => $persona,
            'proyecto' => $proyecto,
            'categoriaProyecto' => $categoriaProyecto,
            'proyectoPregradoCount' => $proyectoPregradoCount,
            'proyectoPosgradoCount' => $proyectoPosgradoCount
        ]);
    }
}
