<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\Horario;
use App\Modelo\Servicio;
use App\Modelo\ReservarHora;
use App\Modelo\BoletaServicio;
use App\Modelo\DetalleServicio;


use App\Http\Requests\TomaHoraCreateRequest;
use App\Http\Requests\TomaHoraUpdateRequest;

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
    public function store(TomaHoraCreateRequest $request)
    {
        try {
            $fecha = date_format(date_create($request->input('fecha_reserva')),'Y-m-d');
            $horario = $request->input('id_horario');
            if ($this->isDisponible($fecha,$horario)) {
                $rh = new ReservarHora();
                $rh->id_servicio = $request->input('id_servicio'); 
                $rh->id_centro = 1;
                $rh->fecha_reserva = $fecha;
                $rh->id_horario = $horario;
                $rh->id_odontologo = 0;
                $rh->comentario = null;
                $rh->activo = 1;
                $rh->id_ficha_cliente = auth('cliente')->user()->id_ficha_cliente;
                $rh->id_estado_reserva = 1;
                $rh->save();
                return back()->with('success','Se ha creado correctamente.');
            } else {
                return back()->with('info','la hora ya esta solicitada.');
            }  
        } catch (\Throwable $th) {
            return back()->with('info','Error Intente nuevamente.');
        }
    }

    public function isDisponible($fecha,$id_horario){
        
        try {
            $r = ReservarHora::where('fecha_reserva',$fecha)->where('id_horario',$id_horario)->firstOrFail();
            return false;
        } catch (\Throwable $th) {
            return true;
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $reservas = ReservarHora::where('id_ficha_cliente',auth('cliente')->user()->id_ficha_cliente)->get();
            return view('paciente.tomaHora.historial',compact('reservas','c'));
        } catch (\Throwable $th) {
            return back()->with('info','Error Intente nuevamente.');
            // return $th;
        }
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
    public function update(TomaHoraUpdateRequest $request, $id)
    {
        try {
            $rh = ReservarHora::where('id_reservar_hora',$id)->firstOrFail();
            $rh->id_estado_reserva = $request->input('id_estado');
            $rh->comentario = $request->input('comentario');
            $rh->id_odontologo = auth('odontologo')->user()->id_odontologo;
            $rh->update();

            if($rh->id_estado_reserva==2){
                $b = new BoletaServicio();
                $b->id_ficha_cliente = $rh->id_ficha_cliente;
                $b->run_cliente =   $rh->cliente->run;
                $b->nombre_cliente = $rh->cliente->nombre_completo();
                $b->correo_cliente = $rh->cliente->correo;
                $b->id_odontologo =  $rh->id_odontologo;
                $b->nombre_odontologo = $rh->odontologo->nombre_completo();
                $b->correo_odontologo = $rh->odontologo->correo;
                $b->fecha_servicio = date('Y-m-d');
                $b->id_horario =$rh->id_horario;
                $b->horario = $rh->horario->horario;
                $b->id_servicio = $rh->id_servicio;
                $b->nombre_servicio = $rh->servicio->nombre_servicio;
                $b->save();

                $detalle = DetalleServicio::where('id_servicio',$b->id_servicio)->get();

                foreach ($detalle as $d) {
                    $d->producto->stock -= $d->cantidad;
                    $d->producto->update();
                }

            }

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
