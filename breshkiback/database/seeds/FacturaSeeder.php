<?php

use App\Factura;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facturas=[
            [
                'fecha'=>'2020-08-13',
                'nit'=> 9636927,
                'monto'=> 300,
                'id_recibo'=> 1,
            ],
            [
                'fecha'=>'2020-08-13',
                'nit'=> 9584758,
                'monto'=> 330,
                'id_recibo'=> 2,
            ],
            [
                'fecha'=>'2020-08-13',
                'nit'=> 9658270,
                'monto'=> 270,
                'id_recibo'=> 3,
            ],
        ];

        foreach ($facturas as $factura) {
            $fact=new Factura();
            $fact->fecha=$factura['fecha'];
            $fact->nit=$factura['nit'];
            $fact->monto=$factura['monto'];
            $fact->id_recibo=$factura['id_recibo'];
            $fact->created_at=Carbon::now();
            $fact->save();
        }
    }
}
