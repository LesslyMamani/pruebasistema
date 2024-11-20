<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MetricasController extends Controller
{
    public function index(){
        return view('metricas.index');
    }
    public function prueba(){

        $user = User::all();

        return view('usuarios.index',compact('user'));


    }
}