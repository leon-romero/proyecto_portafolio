<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\Horario;
use App\Modelo\Servicio;
use App\Modelo\ReservarHora;


class ReservarHoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios=Servicio::get();
        return view('paciente.tomaHora.create',compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        try {
            $rh = ReservarHora::where('id_reservar_hora',$id)->firstOrFail();
            $rh->id_estado_reserva = $request->input('id_estado');
            $rh->comentario = $request->input('comentario');
            $rh->id_odontologo = auth('odontologo')->user()->id_odontologo;
            $rh->update();

            //Se genera la consulta
            // Iteracion actualizar boleta de servicio

            return back()->with('success','Se ha actualizado correctamente.');
        } catch (\Throwable $th) {
            // return back()->with('info','Error Intente nuevamente.');
            return $th;
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
        //
    }
}
