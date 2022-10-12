<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Proyecto;
use App\Models\CategoriaProyecto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectoInvestigacionCount = Proyecto::where('categoria_proyecto_id','!=', 1)->where('categoria_proyecto_id','!=', 2)->count();
        $proyectoPregradoCount = Proyecto::where('categoria_proyecto_id', 1)->count();
        $proyectoPosgradoCount = Proyecto::where('categoria_proyecto_id', 2)->count();
        $personaDocuenteCount = Persona::where('persona_docente',1)->count();
        $persona = Persona::where('persona_docente',1)->get();
        $proyecto = Proyecto::all();
        $categoriaProyecto = CategoriaProyecto::all();
        return view('dashboard.dashboard', compact('proyectoInvestigacionCount', 'personaDocuenteCount', 'persona', 'proyecto', 'categoriaProyecto', 'proyectoPregradoCount', 'proyectoPosgradoCount'));
    }

}
