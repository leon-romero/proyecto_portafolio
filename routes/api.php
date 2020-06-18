<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('horadisponible/{fecha}','ApiController@horasDisponibles')->name('api.horasDisponibles');
