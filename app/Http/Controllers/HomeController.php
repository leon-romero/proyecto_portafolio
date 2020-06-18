<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth('empleado')->check() || auth('cliente')->check() || auth('odontologo')->check() || auth('proveedor')->check()){
            return view('home');
        }else{
            return redirect('/');
        }
    }
}
