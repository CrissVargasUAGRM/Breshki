<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Cristhian Vargas Quiroz';
        $user->email = 'cristhianingsis@gmail.com';
        $user->password = bcrypt('Estudiar');
        $user->save();
    }
}
