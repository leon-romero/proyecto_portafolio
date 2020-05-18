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
        try {
            $rh = new ReservarHora();
            $rh->id_reservar_hora = $request->input('id_reservar_hora');
            $rh->id_centro        = $request->input('id_centro');//null
            $rh->fecha_reserva    = $request->input('fecha_reserva');
            $rh->id_horario       = $request->input('id_horario');
            $rh->id_odontologo    = $request->input('id_odotologo');
            $rh->comentario       = null;
            $rh->activo           = 1;
            $rh->id_ficha_cliente = $request->input('id_ficha_cliente');
            $rh->id_estado_reserva   = $request->input('id_estado_reserva');
            $rh->id_servicio      = $request->input('id_servicio');  
            $rh->save();
            return redirect()->route('paciente.index')->with('success','Se ha creado correctamente.');
        } catch (\Throwable $th) {
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
