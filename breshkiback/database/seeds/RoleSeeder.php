<?php

use App\Roles;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol=new Roles();
        $rol->nombre='Administrador';
        $rol->id_user=1;
        $rol->save();
    }
}
