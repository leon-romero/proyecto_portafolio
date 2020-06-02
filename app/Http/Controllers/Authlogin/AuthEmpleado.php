<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SistemaGestion\Admin;
use Auth;
use App\Http\Requests\AuthLoginRequest as AuthRequest;

class AuthAdminController extends Controller
{

    public function index(){
        if(Auth::guard('empleado')->check()){
            Auth::guard('empleado')->logout();
        }
        if(Auth::guard('cliente')->check()){
            Auth::guard('cliente')->logout();
        }
        if(Auth::guard('odontologo')->check()){
            Auth::guard('')->logout();
        }
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        return view('auth.admin');
    }

    public function login(AuthRequest $request){
        try {
            helper_close_sessions();
            $a = Admin::where('username',$request->username)->firstOrFail();
            $pass =  hash('sha256', $request->password);
            if($a->password==$pass){
                Auth::guard('admin')->loginUsingId($a->id_admin);
                return redirect()->route('home.index');
            }else{
                return back()->with('info','Error. Intente nuevamente.');
            }
        } catch (\Throwable $th) {
            return back()->with('info','Error. Intente nuevamente.');
        }
    }

    public function logout(){
        helper_close_sessions();
        return redirect()->route('auth.usuario.login');
    }
}
