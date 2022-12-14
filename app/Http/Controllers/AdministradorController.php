<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Proyecto;
use App\Models\CategoriaProyecto;
use App\Http\Controllers\Controller;
use App\Models\PersonaProyecto;
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
        $proyectoInvestigacionCount = Proyecto::where('categoria_proyecto_id', '!=', 1)->where('categoria_proyecto_id', '!=', 2)->count();
        $proyectoPregradoCount = Proyecto::where('categoria_proyecto_id', 1)->count();
        $proyectoPosgradoCount = Proyecto::where('categoria_proyecto_id', 2)->count();
        $personaDocuenteCount = Persona::where('persona_docente', 1)->count();
        $persona = Persona::where('persona_docente', 1)->get();
        $proyecto = Proyecto::all();
        $categoriaProyecto = CategoriaProyecto::all();

        $per = PersonaProyecto::join('persona','persona_proyecto.persona_id','=','persona.persona_id')->select('persona_proyecto.persona_id', PersonaProyecto::raw('count(persona_proyecto.persona_proyecto_id) as cantidad'))->where('persona.persona_docente',1)->groupBy('persona_proyecto.persona_id')->orderBy(PersonaProyecto::raw('count(persona_proyecto.persona_proyecto_id)'), 'DESC')->take(10)->skip(0)->get();

        $count = [];

        foreach ($per as $item2) {
            $count[] = ['label' => $item2->Persona->persona_nombres.' '.$item2->Persona->persona_apellidos, 'data' => $item2->cantidad];
        }

        if ($count == null) {
            $count[] = ['label' => 'No se encontro datos', 'data' => 0];
        }

        $dataProyecto = json_encode($count);

        // dd($dataProyecto);

        return view('dashboard.dashboard', compact('proyectoInvestigacionCount', 'personaDocuenteCount', 'persona', 'proyecto', 'categoriaProyecto', 'proyectoPregradoCount', 'proyectoPosgradoCount', 'dataProyecto'));
    }

    public function reporte($id)
    {
        // dd($id);
        $per = Persona::where('persona_id', $id)->first();

        $catPro = CategoriaProyecto::all();

        foreach ($catPro as $item) {
            $reporte = PersonaProyecto::join('proyecto', 'persona_proyecto.proyecto_id', '=', 'proyecto.proyecto_id')->join('convocatoria', 'proyecto.convocatoria_id', '=', 'convocatoria.convocatoria_id')->select('convocatoria.convocatoria', PersonaProyecto::raw('count(persona_proyecto.proyecto_id) as cantidad'))->where('persona_proyecto.persona_id', $id)->where('proyecto.categoria_proyecto_id', $item->categoria_proyecto_id)->groupBy('proyecto.convocatoria_id')->orderBy('proyecto.convocatoria_id', 'DESC')->take(6)->skip(0)->get();

            $count = [];

            foreach ($reporte as $item2) {
                $count[] = ['label' => $item2->convocatoria, 'data' => $item2->cantidad];
            }

            if ($count == null) {
                $count[] = ['label' => 'No se encontro datos', 'data' => 0];
            }

            $categoria[] = $item->categoria_proyecto;

            switch ($item->categoria_proyecto_id) {
                case 1:
                    $data1 = json_encode($count);
                    break;
                case 2:
                    $data2 = json_encode($count);
                    break;
                case 3:
                    $data3 = json_encode($count);
                    break;
                case 4:
                    $data4 = json_encode($count);
                    break;
                case 5:
                    $data5 = json_encode($count);
                    break;
                case 6:
                    $data6 = json_encode($count);
                    break;
                case 7:
                    $data7 = json_encode($count);
                    break;
                case 8:
                    $data8 = json_encode($count);
                    break;
            }
        }

        $persona_id = $id;


        //reporte por lienas
        $reporte_linea = PersonaProyecto::join('proyecto', 'persona_proyecto.proyecto_id', '=', 'proyecto.proyecto_id')
                ->join('persona', 'persona_proyecto.persona_id', '=', 'persona.persona_id')
                ->join('lineas_investigacion', 'proyecto.lineas_investigacion_id', '=', 'lineas_investigacion.lineas_investigacion_id')
                ->select('lineas_investigacion.lineas_investigacion', PersonaProyecto::raw('count(persona_proyecto.proyecto_id) as cantidad'))
                ->where('persona_proyecto.persona_id', $id)
                ->groupBy('proyecto.lineas_investigacion_id')
                ->get();

        $count2 = [];

        foreach ($reporte_linea as $item3) {
            $count2[] = ['label' => $item3->lineas_investigacion, 'data' => $item3->cantidad];
        }

        if ($count2 == null) {
            $count2[] = ['label' => 'No se encontro datos', 'data' => 0];
        }

        $dataReporteLineas = json_encode($count2);

        return view('dashboard.reporte', compact('persona_id', 'per', 'data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'data7', 'data8', 'categoria','dataReporteLineas'));
    }
}
