<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

/**
 * Class TipoController
 * @package App\Http\Controllers
 */
class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $datos['tipos']=Tipo::paginate(5);
     return view('tipo.index',$datos);
        //return view('tipo.index');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      

        $campos=[
            'Nombres'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosTipo = request()->except('_token');
        Tipo::insert($datosTipo);
        //return response()->json($datosTipo);
        return redirect('tipo')->with('mensaje','El empleado fue agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = Tipo::find($id);

        return view('tipo.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = Tipo::findOrFail($id);

        return view('tipo.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipo $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Nombres'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosTipo = request()->except('_token','_method');

        Tipo::where('id','=',$id)->update($datosTipo);
        $tipo=Tipo::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('tipo')->with('mensaje','El dato fue modificado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Tipo::destroy($id);
        return redirect('tipo');
    
    }
}