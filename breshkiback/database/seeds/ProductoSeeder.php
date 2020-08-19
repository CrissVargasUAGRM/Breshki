<?php

use App\Producto;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            [
                'nombre'=>'camisa de verano negra',
                'images'=>'https://mujeresdecompras.com/wp-content/uploads/2020/01/CML-001_FRENTE-e1578767124687.jpg',
                'descripcion'=>'Camisa de manga larga, calidad colombiana, color negro con estapados',
                'precio'=>52,
                'stock'=>12,
                'id_categoria'=>2,
            ],
            [
                'nombre'=>'camisa de verano blanca',
                'images'=>'https://mujeresdecompras.com/wp-content/uploads/2020/01/CML-003_FRENTE-e1578770177389.jpg',
                'descripcion'=>'Camisola de manga 3/4, Calidad Colombiana, Color blanco con dibujo y logo de Mickey Mouse, Ajuste de botones, Cómodo y perfecto para crear un look inusual. Puedes usarlo para ocasiones casuales con pantalón negro o jeans.',
                'precio'=>60,
                'stock'=>10,
                'id_categoria'=>2,
            ],
            [
                'nombre'=>'Short DRAKON SDK-008',
                'images'=>'https://mujeresdecompras.com/wp-content/uploads/2020/06/SDK-008.jpg',
                'descripcion'=>'Short de Alto Rendimiento, Sistema CoolFit / Fresco y Ajustable, Anti Olores – Anti Motas – Secado Rápido, Anti Repelado – Ajuste Automático, Protección contra rayos UV, TALLA ÚNICA (Cubre tallas 34 hasta 46)',
                'precio'=>48,
                'stock'=>12,
                'id_categoria'=>3,
            ],
            [
                'nombre'=>'Short DRAKON SDK-003',
                'images'=>'https://mujeresdecompras.com/wp-content/uploads/2020/06/SDK-003P.jpg',
                'descripcion'=>'Short de Alto Rendimiento, Sistema CoolFit / Fresco y Ajustable, Anti Olores – Anti Motas – Secado Rápido',
                'precio'=>49,
                'stock'=>13,
                'id_categoria'=>3,
            ],
            [
                'nombre'=>'Jeans Kan Can 6219D',
                'images'=>'https://mujeresdecompras.com/wp-content/uploads/2020/01/KC6219D_FRENTE.jpg',
                'descripcion'=>'eans tipo tobillera, Color azul marino y detalles de desgaste, Ajuste de botón',
                'precio'=>50,
                'stock'=>14,
                'id_categoria'=>1,
            ],
            [
                'nombre'=>'Jeans Kan Can 6239WT',
                'images'=>'https://mujeresdecompras.com/wp-content/uploads/2020/01/KC6239WT-FRENTE.jpg',
                'descripcion'=>'Jeans tipo tobillero, Color blanco entero, Ajuste de botón, Con detalles de rasgado medio',
                'precio'=>51,
                'stock'=>10,
                'id_categoria'=>1,
            ],
            [
                'nombre'=>'Ropa interior de encaje',
                'images'=>'https://i.pinimg.com/236x/92/e1/6c/92e16c519c21c29ca9dcd23866ba9ec6.jpg',
                'descripcion'=>'encaje de calidad, tallas M L XL XXL, Blanco y Azul',
                'precio'=>13,
                'stock'=>10,
                'id_categoria'=>4,
            ],
            [
                'nombre'=>'Modelo Lonely',
                'images'=>'https://images-na.ssl-images-amazon.com/images/I/51DHrmYzfCL._AC_SX522_.jpg',
                'descripcion'=>'Algodón y Lycra (90%), Regulable, Disponible en Bordó, coral, negro, beige y azul marino',
                'precio'=>9,
                'stock'=>10,
                'id_categoria'=>4,
            ]
        ];
        foreach ($productos as $producto) {
            $product=new Producto();
            $product->nombre=$producto['nombre'];
            $product->images=$producto['images'];
            $product->descripcion=$producto['descripcion'];
            $product->precio=$producto['precio'];
            $product->stock=$producto['stock'];
            $product->id_categoria=$producto['id_categoria'];
            $product->created_at=Carbon::now();
            $product->save();
        }
    }
}
