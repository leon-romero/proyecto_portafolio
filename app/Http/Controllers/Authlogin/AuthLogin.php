<?php

namespace App\Http\Controllers\Authlogin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modelo\Empleado;
use App\Modelo\Odontologo;
use App\Modelo\FichaCliente as Cliente;
use App\Modelo\FichaProveedor as Proveedor;

use App\Http\Requests\LoginRequest;

use Auth;

class AuthLogin extends Controller
{

    public function index(){
        return view('auth.index');
    }

    public function loginEmpleado(LoginRequest $request){
        try {
            $this->cerrar();
            $e = Empleado::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($e->password==$pass){
                Auth::guard('empleado')->loginUsingId($e->id_empleado);
                return redirect()->route('home');
            }else{
                return back()->with('info','Error. Intente nuevamente.');
            }
        } catch (\Throwable $th) {
            return back()->with('info','Error. Intente nuevamente.');
        }
    }
    public function loginCliente(LoginRequest $request){
        try {
            $this->cerrar();
            $c = Cliente::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($c->password==$pass){
                Auth::guard('cliente')->loginUsingId($c->id_ficha_cliente);
                return redirect()->route('home.cliente');
            }else{
                return back()->with('info','Error. Intente nuevamente.');
            }
        } catch (\Throwable $th) {
            return back()->with('info','Error. Intente nuevamente.');
        }
    }
    public function loginProveedor(LoginRequest $request){
        try {
            $this->cerrar();
            $p = Proveedor::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($p->password==$pass){
                Auth::guard('proveedor')->loginUsingId($p->id_ficha_proveedor);
                return redirect()->route('home');
            }else{
                return back()->with('info','Error. Intente nuevamente.');
            }
        } catch (\Throwable $th) {
            return back()->with('info','Error. Intente nuevamente.');
        }
    }
    public function loginOdontologo(LoginRequest $request){
        try {
            $this->cerrar();
            $o = Odontologo::where('username',$request->username)->firstOrFail();
            // $pass =  hash('sha256', $request->password);
            $pass =  $request->password;
            if($o->password==$pass){
                Auth::guard('odontologo')->loginUsingId($o->id_odontologo);
                return redirect()->route('home');
            }else{
                return back()->with('info','Error. Intente nuevamente.');
            }
        } catch (\Throwable $th) {
            return back()->with('info','Error. Intente nuevamente.');
        }
    }


    public function logout(){
        $this->cerrar();
        return redirect('/');
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
