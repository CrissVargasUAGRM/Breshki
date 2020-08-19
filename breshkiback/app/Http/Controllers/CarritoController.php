<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function addCart(Request $request){
        $idUser=auth()->user()->id;
        $idProduct=$request['idProduct'];
        $cantidad=$request['cantidad'];
        $precio=$request['precio'];
        $total=$cantidad * $precio;
        $carrito=Carrito::where('id_user', $idUser)->first();

        if ($carrito==null) {
            $carrito=new Carrito();
            $carrito->total=0;
            $carrito->id_user=$idUser;
            $carrito->created_at=Carbon::now();
            $carrito->updated_at=Carbon::now();
            $carrito->save();
        }

        $prodCarrito=DB::table('carrito_compra')->where([
            ['id_carrito', $carrito->id],
            ['id_producto', $idProduct],
        ])->exists();

        if($prodCarrito){
            return response()->json('Este producto ya esta en el carrito', 406);
        }else{
            DB::table('carrito_compra')->insert([
                'id_carrito'=>$carrito->id,
                'id_producto'=>$idProduct,
                'cantidad'=>$cantidad,
                'precio'=>$precio,
            ]);

            $carrito->total=$carrito->total + $total;
            $carrito->save();
            return response()->json('Producto insertado en el carrito', 200);
        }
    }

    public function getCart(Request $request){
        $userId=$request['idUser'];
        $carrito=Carrito::where([
            ['id_user', $userId]
        ])->first();

        if($carrito==null){
            return response()->json('El usuario no tiene un productos o un carrito', 404);
        }

        $products=DB::table('carrito_compra')
        ->join('productos', 'carrito_compra.id_producto', 'productos.id')
        ->where('id_carrito', $carrito->id)
        ->select('productos.id', 'productos.nombre', 'productos.images', 'productos.descripcion', 'productos.precio', 'cantidad')
        ->get();

        $respuesta=[
            'total'=>$carrito->total,
            'productos'=>$products,
        ];

        return response()->json($respuesta, 200);
    }

    public function deleteProdCart($idProduct){
        $userId=auth()->user()->id;
        $carrito=Carrito::where('id_user', $userId)->first();
   
        if($carrito!=null){
            $productCart=DB::table('carrito_compra')->where([
                ['id_producto', $idProduct],
                ['id_carrito', $carrito->id],
            ])->first();

            $monto=$productCart->cantidad * $productCart->precio;

            $carrito->total=$carrito->total - $monto;
            $carrito->save();

            DB::table('carrito_compra')->where([
                ['id_producto', $idProduct],
                ['id_carrito', $carrito->id]
            ])->delete();

            return response()->json('El producto fue eliminado correctamente del carrito', 200);

        }else{
            return response()->json('El carrito no existe', 404);
        }
    }
}
