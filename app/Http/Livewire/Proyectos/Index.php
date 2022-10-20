<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use App\Models\Publicacion;
use App\Models\Revista;
use Livewire\Component;

class Index extends Component
{
    public $buscar;
    public $revista;
    public $fecha;
    public $otros;
    public $mostrar = 0;
    public $boton = 'Guardar';

    public function updated()
    {
        if($this->revista){
            $rev = Revista::where('revista_id',$this->revista)->first();
            if($rev->revista == 'OTROS'){
                $this->mostrar = 1;
            }else{
                $this->mostrar = 0;
                $this->reset('otros');
            }
        }
        if($this->revista == ''){
            $this->mostrar = 0;
        }
    }

    public function cargarId($id)
    {
        // $this->proyecto_id = $id;
        $publi = Publicacion::where('proyecto_id',$id)->first();
        // dd($publi);
        $this->limpiar();

        if($publi){
            $this->boton = 'Actualizar';

            $this->revista = $publi->revista_id;
            $rev = Revista::where('revista_id',$publi->revista_id)->first();
            if($rev->revista == 'OTROS'){
                $this->mostrar = 1;
            }else{
                $this->mostrar = 0;
                $this->reset('otros');
            }
            $this->otros = $publi->revista_observacion;
            $this->fecha = $publi->publicacion_fecha;
        }

    }

    public function limpiar()
    {
        $this->reset('revista','otros','fecha');
        $this->mostrar = 0;
        $this->boton = 'Guardar';
    }

    public function publicacion($id)
    {
        if($this->revista){
            $rev = Revista::where('revista_id',$this->revista)->first();
            if($rev->revista == 'OTROS'){
                $this->validate([
                    'otros' => 'required|string',
                    'fecha' => 'required|date',
                    'revista' => 'required|numeric',
                ]);
            }else{
                $this->validate([
                    'otros' => 'nullable|string',
                    'fecha' => 'required|date',
                    'revista' => 'required|numeric',
                ]);
            }
        }
        $this->validate([
            'otros' => 'nullable|string',
            'fecha' => 'required|date',
            'revista' => 'required|numeric',
        ]);

        $rev = Revista::where('revista_id',$this->revista)->first();
        if($rev->revista != 'OTROS'){
            $this->otros = $rev->revista;
        }

        $publi = Publicacion::where('proyecto_id',$id)->first();

        if($publi){
            $publicacion = Publicacion::where('proyecto_id',$id)->first();
            $publicacion->publicacion_fecha = $this->fecha;
            $publicacion->revista_id = $this->revista;
            $publicacion->revista_observacion = $this->otros;
            $publicacion->save();

            session()->flash('message', 'Proyecto publicado actualizado satisfactoriamente.');
        }else{
            $publicacion = Publicacion::create([
                "publicacion_fecha" => $this->fecha,
                "revista_id" => $this->revista,
                "revista_observacion" => $this->otros,
                "proyecto_id" => $id,
            ]);

            session()->flash('message', 'Proyecto publicado satisfactoriamente.');
        }

        // dd($id, $this->all());

        $this->dispatchBrowserEvent('publicacionModal', ['id' => $id]);
        // $this->emit('publicacionModal',$id);

        $this->limpiar();
    }

    public function render()
    {
        $revistas = Revista::all(); // obtiene todos los datos de la tabla revista
        $proyecto = Proyecto::join('categoria_proyecto','proyecto.categoria_proyecto_id','=','categoria_proyecto.categoria_proyecto_id')->where('proyecto.proyecto_titulo','LIKE',"%{$this->buscar}%")->orWhere('categoria_proyecto.categoria_proyecto','LIKE',"%{$this->buscar}%")->orWhere('proyecto.proyecto_id','LIKE',"%{$this->buscar}%")->orWhere('proyecto.proyecto_financiamiento','LIKE',"%{$this->buscar}%")->orderBy('proyecto.proyecto_id','DESC')->paginate(10);
        return view('livewire.proyectos.index',[
            'proyecto' => $proyecto,
            'revistas' => $revistas,
        ]);
    }
}
