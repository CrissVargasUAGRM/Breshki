<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $respuesta=Categoria::all();
        return response()->json($respuesta->toArray(),200); 
    }
}
