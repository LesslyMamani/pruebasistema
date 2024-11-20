<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MetricasController extends Controller
{
    public function index(){
        $usuario = User::all();
        return view('metricas.index',compact('usuario'));
    }
    public function prueba(){
        return view('usuarios.index');
    }
}
