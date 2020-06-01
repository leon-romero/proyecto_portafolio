<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Modelo\FichaCliente;
use App\Modelo\Comuna;
use App\Modelo\Region;
use App\Modelo\Documento;
use App\Modelo\DetalleDocumento;

use App\Http\Requests\CreatePacienteRequest as RequestCliente;



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
        return view('admin.paciente.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas=Comuna::all();
        $regiones = Region::all();
        return view('admin.paciente.create',compact('comunas','regiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCliente $request)
    {
        try {
            // return $request;
            $fc = new FichaCliente();
            $fc->username    =  $request->input('run');
            $fc->password    = '12345';
            $fc->run         = $request->input('run');
            $fc->nombres     = $request->input('nombres');
            $fc->apellidos   = $request->input('apellidos');
            $fc->telefono    = $request->input('telefono');
            $fc->correo      = $request->input('correo');
            $fc->id_comuna   = $request->input('id_comuna');
            $fc->direccion   = $request->input('direccion');
            $fc->bloqueo     = 0;
            $fc->activo      = 1;
            $fc->save();
            return redirect()->route('paciente.index')->with('success','Se ha creador correctamente.');

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
    public function edit($rut)
    {
        try {
            $comunas=Comuna::all();
            $regiones = Region::all();
            $p = FichaCliente::where('run',$rut)->firstOrFail();
            return view('admin.paciente.edit',compact('p','comunas','regiones'));
        } catch (\Throwable $th) {
            // return $th;
            return redirect()->route('paciente.index')->with('info','Error intente nuevamente.');

        }
      
    }

    public function documento($rut)
    {
        $documentos = Documento::all();
        $p = FichaCliente::where('run',$rut)->firstOrFail();
        $documentos_paciente = DetalleDocumento::where('id_ficha_cliente',$p->id_ficha_cliente)->get();
        return view('admin.paciente.documento.index',compact('p','documentos','documentos_paciente'));
    }

    public function eliminarDocumento($id_docuemento){
        $d = DetalleDocumento::findOrFail($id_docuemento);   
        Storage::delete($d->ruta);
        $d->delete();
        return back()->with('success','Se ha eliminado correctamente.');
    }

    
    public function subirDocumento(Request $request,$rut){
        
        // $file = $request->file('archivo');    
        // $nombre = $file->getClientOriginalName();    

        $p = FichaCliente::where('run',$rut)->firstOrFail();
        $detalle = new DetalleDocumento();
        $detalle->id_ficha_cliente = $p->id_ficha_cliente;
        $detalle->id_documento = $request->input('id_documento');
        $detalle->ruta = $request->file('archivo')->store('public');   //uid
        $detalle->save();
        return back()->with('success','Se ha creado correctamente.');
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rut)
    {
        try {
            $fc = FichaCliente::where('run',$rut)->firstOrFail();
            $fc->username    =  $request->input('run');
            // $fc->password    = '12345';
            $fc->run         = $request->input('run');
            $fc->nombres     = $request->input('nombres');
            $fc->apellidos   = $request->input('apellidos');
            $fc->telefono    = $request->input('telefono');
            $fc->correo      = $request->input('correo');
            $fc->id_comuna   = $request->input('id_comuna');
            $fc->direccion   = $request->input('direccion');
            // $fc->bloqueo     = 0;
            // $fc->activo      = 1;
            $fc->update();
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
        //
    }
}
