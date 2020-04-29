<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Empleado;
use App\Modelo\TipoEmpleado;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados=Empleado::get();    
        //  return $pacientes;
       return view('admin.empleado.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoEMpleado=TipoEmpleado::all();
        return view('admin.empleado.create',compact('tipoEmpleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // return $request;
            $em = new Empleado();
            $em->username                =  $request->input('run');
            $em->password                = '12345';
            $em->run                     = $request->input('run');
            $em->nombres                 = $request->input('nombres');
            $em->apellidos               = $request->input('apellidos');
            $em->telefono                = $request->input('telefono');
            $em->correo                  = $request->input('correo');
            $em->id_tipo_empleado        = 1; //por ahora no hay tipos de empleados, pero está modelado para tipos de empleados
            $em->bloqueado                 = 0;
            $em->activo                  = 1;
            $em->save();
            return redirect()->route('empleado.index')->with('success','Se ha creador correctamente.');

        } catch (\Throwable $th) {
            // return $th;

            return back()->with('info','Error Intente nuevamente.');
        }
      
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
    public function edit($run)
    {
        try {
            $em = Empleado::where('run',$run)->firstOrFail();
            return view('admin.empleado.edit',compact('em'));
        } catch (\Throwable $th) {
            // return $th;
            return redirect()->route('empleado.index')->with('info','Error intente nuevamente.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $run)
    {
        try {
            // return $request;
            $em = Empleado::where('run',$run)->firstOrFail();
            $em->username                =  $request->input('run');
            $em->run                     = $request->input('run');
            $em->nombres                 = $request->input('nombres');
            $em->apellidos               = $request->input('apellidos');
            $em->telefono                = $request->input('telefono');
            $em->correo                  = $request->input('correo');
            $em->update();
            return back()->with('success','Se ha actualizado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('danger','Error Intente nuevamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Empleado::where('id_empleado',$id)->firstOrFail();
        // if ($emp->activo ==1) {
        //     $emp->activo=0;
        // } else {
        //     $emp->activo=1;
        // }

        $emp->activo==1 ? $emp->activo=0 : $emp->activo=1;
        $emp->update();
        return back()->with('success','Se ha actualizado Correctamente.');
    }
}

