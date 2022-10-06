<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $persona = Persona::all();
        return view('persona.index', compact('persona'));
    }

    public function create()
    {
        return view('persona.create');
    }

    public function edit($id)
    {
        $persona_id = $id;
        return view('persona.edit', compact('persona_id'));
    }

    public function destroy($id)
    {
        //
    }
}
