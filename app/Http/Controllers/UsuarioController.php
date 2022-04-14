<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller{
    public function index(){
        return 'desde index';
    }
    public function show(Request $request){
        $parametro = $request->usuario;
        echo 'Hola '.$parametro;
    }
}

