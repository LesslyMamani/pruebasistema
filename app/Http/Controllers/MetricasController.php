<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetricasController extends Controller
{
    public function index(){
        return view('metricas.index');
    }
}