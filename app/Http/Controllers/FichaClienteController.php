<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\FichaCliente;
use App\Modelo\Comuna;


class FichaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes=FichaCliente::all();    
      //  return $pacientes;
        return view('paciente.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas=Comuna::all();
        return view('paciente.create',compact('comunas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $fc = new FichaCliente();
        $fc->username=$request->input('run');
        $fc->password='12345';
        $fc->run=$request->input('run');
        $fc->nombres=$request->input('nombre');
        $fc->apellidos='';
        $fc->telefono='';
        $fc->correo=$request->input('correo');
        $fc->id_comuna=$request->input('id_comuna');
        $fc->direccion='';
        $fc->bloqueo=0;
        $fc->activo=1;
        $fc->save();
     


        // $table->string('username', 60)->unique();
        // $table->string('password', 64);
        // $table->string('run', 15)->unique();
        // $table->string('nombres', 100);
        // $table->string('apellidos', 100);
        // $table->string('telefono', 60)->nullable();
        // $table->string('correo', 100)->unique();
        // $table->integer('id_comuna');
        // $table->text('direccion');
        // $table->integer('bloqueo');
        // $table->integer('activo');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
