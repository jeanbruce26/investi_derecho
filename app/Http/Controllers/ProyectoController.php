<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        return view('proyectos.index');
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $proyecto_id = $id;
        return view('proyectos.edit', compact('proyecto_id'));
    }

    public function destroy($id)
    {
        //
    }

    public function participant($id)
    {
        $proyecto_id = $id;
        $proyecto = Proyecto::find($id);
        return view('proyectos.particpant', compact('proyecto_id','proyecto'));
    }
}
