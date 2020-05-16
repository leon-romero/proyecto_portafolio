<?php

namespace App\Http\Controllers\Authlogin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelo\FichaProveedor as Proveedor;
use App\Modelo\Empleado;
use App\Modelo\Odontologo;
use App\Modelo\FichaCliente as Cliente;

use Auth;

// use App\Http\Requests\AuthLoginRequest as AuthRequest;

class AuthLogin extends Controller
{

    public function index(){
        return view('auth.index');
    }

    public function loginEmpleado(Request $request){
        try {
            $this->cerrar();
            $e = Empleado::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($e->password==$pass){
                Auth::guard('empleado')->loginUsingId($e->id_empleado);
                return redirect()->route('home');
                // return auth('empleado')->user();
            }else{
                // return back()->with('info','Error. Intente nuevamente.');
                return "nada";
            }
        } catch (\Throwable $th) {
            // return back()->with('info','Error. Intente nuevamente.');
            return $th;
        }
    }
    public function loginCliente(Request $request){
        try {
            $this->cerrar();
            $c = Cliente::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($c->password==$pass){
                Auth::guard('cliente')->loginUsingId($c->id_ficha_cliente);
                return redirect()->route('home');
                // return auth('empleado')->user();
            }else{
                // return back()->with('info','Error. Intente nuevamente.');
                return "nada";
            }
        } catch (\Throwable $th) {
            // return back()->with('info','Error. Intente nuevamente.');
            return $th;
        }
    }
    public function loginProveedor(Request $request){
        try {
            $this->cerrar();
            $p = Proveedor::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($p->password==$pass){
                Auth::guard('proveedor')->loginUsingId($p->id_ficha_proveedor);
                return redirect()->route('home');
                // return auth('empleado')->user();
            }else{
                // return back()->with('info','Error. Intente nuevamente.');
                return "nada";
            }
        } catch (\Throwable $th) {
            // return back()->with('info','Error. Intente nuevamente.');
            return $th;
        }
    }
    public function loginOdontologo(Request $request){
        try {
            $this->cerrar();
            $o = Odontologo::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($o->password==$pass){
                Auth::guard('odontologo')->loginUsingId($o->id_odontologo);
                return redirect()->route('home');
            }else{
                // return back()->with('info','Error. Intente nuevamente.');
                return "nada";
            }
        } catch (\Throwable $th) {
            // return back()->with('info','Error. Intente nuevamente.');
            return $th;
        }
    }


    public function logout(){
        $this->cerrar();
        return redirect()->route('/');
    }

    public function cerrar(){
        if(Auth::guard('empleado')->check()){
            Auth::guard('empleado')->logout();
        }
        if(Auth::guard('cliente')->check()){
            Auth::guard('cliente')->logout();
        }
        if(Auth::guard('odontologo')->check()){
            Auth::guard('odontologo')->logout();
        }
        if(Auth::guard('proveedor')->check()){
            Auth::guard('proveedor')->logout();
        }
    }
}
