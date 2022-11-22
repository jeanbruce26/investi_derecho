<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use App\Models\Publicacion;
use App\Models\Categoria;
use Livewire\Component;

class Index extends Component
{
    public $buscar;
    public $boton = 'Guardar';
    public $modo = 1;

    public $revista, $link, $categoria, $fecha, $proyecto_id;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'revista' => 'nullable|string',
            'link' => 'nullable|string',
            'categoria' => 'nullable|numeric',
            'fecha' => 'required|date',
        ]);
    }

    public function cargarId(Proyecto $proyecto)
    {
        $this->proyecto_id = $proyecto->proyecto_id;

        $publicacion = Publicacion::where('proyecto_id', $this->proyecto_id)->first();

        if($publicacion){
            $this->modo = 2;
            $this->revista = $publicacion->publicacion_revista;
            $this->link = $publicacion->publicacion_link;
            $this->categoria = $publicacion->categoria_id;
            $this->fecha = $publicacion->publicacion_fecha;
            $this->boton = 'Actualizar';
        }else{
            $this->modo = 1;
            $this->boton = 'Guardar';
            $this->limpiar();
        }
    }

    public function limpiar()
    {
        $this->reset(['revista', 'link', 'categoria', 'fecha']);
        $this->resetErrorBag();
    }

    public function publicacion()
    {
        $this->validate([
            'revista' => 'nullable|string',
            'link' => 'nullable|string',
            'categoria' => 'nullable|numeric',
            'fecha' => 'required|date',
        ]);

        if($this->modo == 1){
            Publicacion::create([
                'publicacion_fecha' => $this->fecha,
                'categoria_id' => $this->categoria,
                'publicacion_revista' => $this->revista,
                'publicacion_link' => $this->link,
                'proyecto_id' => $this->proyecto_id,
            ]);

            session()->flash('message', 'Publicación registrada con éxito.');
        }else{
            Publicacion::where('proyecto_id', $this->proyecto_id)->update([
                'publicacion_fecha' => $this->fecha,
                'categoria_id' => $this->categoria,
                'publicacion_revista' => $this->revista,
                'publicacion_link' => $this->link,
            ]);

            session()->flash('message', 'Publicación actualizada con éxito.');
        }


        $this->dispatchBrowserEvent('publicacionModal');
        $this->limpiar();
    }

    public function render()
    {
        $categoria_model = Categoria::all(); // obtiene todos los datos de la tabla categoria
        $proyecto = Proyecto::join('categoria_proyecto','proyecto.categoria_proyecto_id','=','categoria_proyecto.categoria_proyecto_id')
                ->where('proyecto.proyecto_titulo','LIKE',"%{$this->buscar}%")
                ->orWhere('categoria_proyecto.categoria_proyecto','LIKE',"%{$this->buscar}%")
                ->orWhere('proyecto.proyecto_id','LIKE',"%{$this->buscar}%")
                ->orWhere('proyecto.proyecto_financiamiento','LIKE',"%{$this->buscar}%")
                ->orderBy('proyecto.proyecto_id','DESC')
                ->paginate(20);

        return view('livewire.proyectos.index',[
            'proyecto' => $proyecto,
            'categoria_model' => $categoria_model,
        ]);
    }
}
