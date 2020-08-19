<?php

use App\Recibo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReciboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recibos = [
            [
                'fecha'=>'2020-08-13',
                'monto'=> 300,
                'id_user'=> 1,
            ],
            [
                'fecha'=>'2020-08-13',
                'monto'=> 330,
                'id_user'=> 1,
            ],
            [
                'fecha'=>'2020-08-13',
                'monto'=> 270,
                'id_user'=> 1,
            ],
        ];

        foreach ($recibos as $recibo) {
            $rec=new Recibo();
            $rec->fecha=$recibo['fecha'];
            $rec->monto=$recibo['monto'];
            $rec->id_user=$recibo['id_user'];
            $rec->created_at=Carbon::now();
            $rec->save();
        }
    }
}
