<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados= Empleado::paginate();
        //$datos['empleados']=Empleado::paginate(2);
        //return view('empleado.index',compact('empleados'))
        //->with('i', (request()->input('page', 1) -1) * $empleados->perPage());
        //return view('empleado.create');
        return response()->json(['response' => $empleados,'prueba' => $empleados],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado= new Empleado();
        $tipos= Tipo::pluck('nombres','id');
        //return view('empleado.create', compact('empleado','tipos'));
        return response()->json(['response' => $empleados,'prueba' => $empleados],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombres'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Imagen'=>'required|max:1000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'Se requiere de la imagen'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosEmpleado = request()->except('_token');

        if($request->hasFile('Imagen')){
            $datosEmpleado['Imagen']=$request->file('Imagen')->store('uploads','public');  
        }

        Empleado::insert($datosEmpleado);
        return response()->json(['response' => $empleados,'prueba' => $empleados],200);
        //return redirect('empleado')->with('mensaje','El empleado fue agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empleado::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados=Empleado::findOrFail($id);
        $tipos= Tipo::pluck('nombres','id');
        //return view('empleado.edit',compact('empleado','tipos'));
        return response()->json(['response' => $empleados,'prueba' => $empleados],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombres'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen'=>'required|string|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required'=>'Se requiere de la imagen'];
        }

        $this->validate($request, $campos, $mensaje);
        

        $datosEmpleado = request()->except('_token','_method');

        if($request->hasFile('Imagen')){
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Imagen);
            $datosEmpleado['Imagen']=$request->file('Imagen')->store('uploads','public');  
        }

        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        //return redirect('empleado')->with('mensaje','El dato fue modificado');
        return response()->json(['response' => $empleados,'prueba' => $empleados],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado=Empleado::findOrFail($id);

        if(Storage::delete('public/'.$empleado->Imagen)){
            Empleado::destroy($id);
        }
        //return redirect('empleado')->with('mensaje','El empleado fue borrado');
        return response()->json(['response' => $empleados,'prueba' => $empleados],200);
    }
}
