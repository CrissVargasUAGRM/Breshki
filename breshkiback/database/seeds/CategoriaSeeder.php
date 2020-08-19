<?php

use App\Categoria;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias=[
            [
                'nombre'=>'Pantalones',
                'descripcion'=>'Prendas Jeans, tela, etc'
            ],
            [
                'nombre'=>'Camisas',
                'descripcion'=>'Casuales, Verano, Invierno, Formales'
            ],
            [
                'nombre'=>'Deportivos',
                'descripcion'=>'Prendas ideales para realizar actividad fisica al aire libre'
            ],
            [
                'nombre'=>'Ropa Interior',
                'descripcion'=>'Lenceria para toda ocacion y edad'
            ]
        ];

        foreach ($categorias as $categoria) {
            $category=new Categoria();
            $category->nombre=$categoria['nombre'];
            $category->descripcion=$categoria['descripcion'];
            $category->created_at=Carbon::now();
            $category->save();
        }
    }
}
