<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyecto = Proyecto::all();
        return view('proyectos.index', compact('proyecto'));
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
}
