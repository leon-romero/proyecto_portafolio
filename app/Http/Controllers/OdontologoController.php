<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Odontologo;

use App\Http\Requests\CreateOdontologoRequest as RequestOdontologo;

class OdontologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odontologos=Odontologo::get();
        //  return $odontologos;
       return view('admin.odontologo.index',compact('odontologos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tipoodpleado=Tipoodpleado::all();
        // return view('admin.odpleado.create',compact('tipoodpleado'));
        return view('admin.odontologo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestOdontologo $request)
    {
        try {
            // return $request;
            $od = new Odontologo();
            $od->username                =  $request->input('run');
            $od->password                = '12345';
            $od->run                     = $request->input('run');
            $od->nombres                 = $request->input('nombres');
            $od->apellidos               = $request->input('apellidos');
            $od->telefono                = $request->input('telefono');
            $od->correo                  = $request->input('correo');
            $od->activo                  = 1;
            $od->save();
            return redirect()->route('odontologo.index')->with('success','Se ha creador correctamente.');

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
            $od = Odontologo::where('run',$run)->firstOrFail();
            return view('admin.odontologo.edit',compact('od'));
        } catch (\Throwable $th) {
            // return $th;
            return redirect()->route('odontologo.index')->with('info','Error intente nuevamente.');
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
            $od = Odontologo::where('run',$run)->firstOrFail();
            $od->username                =  $request->input('run');
            $od->run                     = $request->input('run');
            $od->nombres                 = $request->input('nombres');
            $od->apellidos               = $request->input('apellidos');
            $od->telefono                = $request->input('telefono');
            $od->correo                  = $request->input('correo');
            $od->update();
            return back()->with('success','Se ha actualizado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('danger','Error Intente nuevamente.');
        }
    }

    /**
     * Rodove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $odp = Odontologo::where('id_odontologo',$id)->firstOrFail();
        // // if ($odp->activo ==1) {
        // //     $odp->activo=0;
        // // } else {
        // //     $odp->activo=1;
        // // }

        // $odp->activo==1 ? $odp->activo=0 : $odp->activo=1;
        // $odp->update();
        // return back()->with('success','Se ha actualizado Correctamente.');
    }
}