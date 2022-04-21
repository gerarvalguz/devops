<?php

namespace App\Http\Controllers;

use App\Models\TipoProyecto;
use App\Models\Proyecto;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $query = auth()->user()->proyectos()->paginate(5);
        return view('proyectos.index')
                    ->with('query', $query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProyectos = TipoProyecto::where('status',true)
                        ->orderBy('nombre', 'ASC')
                        ->get(); 
        
        return view('proyectos.create', compact('tipoProyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temp = $request->validate([
            'nombre' => 'required|string|min:5|alpha',
            'tipo_proyecto'=>'required',
            'descripcion' => 'required|string|min:1|alpha-dash'
        ]);

        $proyecto = auth()->user()->proyectos()->create([
            // 'user_id' => auth()->id,
            'nombre' => Str::title($request->input('nombre')),
            'descripcion' => Str::ucfirst($request->input('descripcion')),
            'slug' => Str::slug($request->nombre),
            'proyecto_id' => $request->input('tipo_proyecto'),
            'estatus_id' => 1,

        ]);

        return redirect()->route('proyectos.index')
                        ->with('tipo', 'exitoso')
                        ->with('mensaje', "Proyecto {$request->nombre} creado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);      
        $tipoProyectos = TipoProyecto::where('status',true)
                        ->orderBy('nombre', 'ASC')
                        ->get();  
        // dd($proyecto);
        return view ('proyectos.edit', compact('proyecto', 'tipoProyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $temp = $request->validate([
            'nombre' => 'required|string|min:5|alpha',
            'tipo_proyecto'=>'required',
            'descripcion' => 'required|string|min:1|alpha-dash'
        ]);

        //Actualizar registro
        $proyecto->nombre = Str::title($request->input('nombre'));
        $proyecto->descripcion = Str::ucfirst($request->input('descripcion'));
        $proyecto->slug = Str::slug($request->nombre);
        $proyecto->proyecto_id = $request->input('tipo_proyecto');
        $proyecto->estatus_id = 1;
        $proyecto->save();


        return redirect()->route('proyectos.index')
                        ->with('tipo', 'exitoso')
                        ->with('mensaje', "Proyecto {$request->nombre} actualizado exitosamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadPdf()
    {
        $proyectos = Proyecto::all();

        view()->share('proyectos.download',$proyectos);

        $pdf = PDF::loadView('proyectos.download', ['proyectos' => $proyectos]);

        return $pdf->download('Proyectos'.'.pdf');
    }
}
