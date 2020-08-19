<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = Producto::all();
        return response()->json($respuesta->toArray(),200);
    }

    public function getProductCategory(Request $request){
        $respuesta=Producto::latest()
        ->when($request->has('category'), function($query) use ($request){
            $query->where('id_categoria', $request->query('category'));
        })->get();
        return response()->json($respuesta,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $request)
    {
        $respuesta=Producto::latest()
        ->when($request->has('search'), function($query) use ($request){
            $query->where('nombre', 'like', '%' . $request->query('search') . '%');
        })->get();
        return response()->json($respuesta,200);
    }

}
