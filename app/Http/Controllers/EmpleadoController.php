<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reglas=[

            'Nombre'=>'required|string|max:100',

            'Apellido'=>'required|string|max:100',

            'Correo'=>'required|email',

            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg,webp,gif',

        ];

$mensaje=[

            'required'=>'El :attribute es requerido',

            'Foto.required'=>'La foto es requerida',

        ];



$this->validate($request, $reglas, $mensaje);


        $datosEmpleados = $request->except('_token');
        if ($request->hasFile('Foto')) {
            $datosEmpleados['Foto'] = $request->file('Foto')->store('uploads', 'public');
        Empleado::insert($datosEmpleados);
        return redirect('empleado')->with('mensaje', 'Empleado creado con éxito.');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));

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
        $validacion=[

            'Nombre'=>'required|string|max:100',

            'Apellido'=>'required|string|max:100',

            'Correo'=>'required|email',

        ];

        $mensaje=[

            'required'=>'El :attribute es requerido',

        ];

        if($request->hasFile('Foto')){

            $validacion['Foto']=['required|max:10000|mimes:jpeg,png,jpg,webp,gif,'];

            $mensaje['Foto.required']=['La foto es requerida'];



        }

        $this->validate($request, $validacion, $mensaje);

        $datosEmpleado = Request()->except(['_token', '_method']);

        if($request->hasFile('Foto')){

            $empleado = Empleado::findOrFail($id);

            Storage::delete('public/' . $empleado->Foto);

            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads','public');

        }

        Empleado::where('id', '=', $id)->update($datosEmpleado);

        $empleado = Empleado::findOrFail($id);

        return redirect('empleado')->with('mensaje','Empleado Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        Storage::delete('public/' . $empleado->Foto);

        Empleado::destroy($id);

        return redirect('empleado')->with('mensaje', 'Empleado eliminado con éxito.');
    }
}
