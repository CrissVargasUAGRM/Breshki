<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $credenciales=[
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];

        $token = Auth::attempt($credenciales);

        if(!$token){
            return response()->json(['error' => 'Unauthorized']);
        }
        $idUser = auth()->user()->id;
        return response()->json(['token' => $token, 'idUser'=>$idUser]);
    }

    public function userRegister(Request $request){
        $request->validate([
            'name'=>[
                'required',
                'string',
            ],
            'email'=>[
                'required',
                'email',
            ],
            'password'=>[
                'required',
                'string',
            ],
        ]);

        $user=User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);

        return response()->json(['mensaje'=>'Registro exitoso', 'user'=>$user], 200);
    }

    public function cerrarSesion(){
        Auth::logout();
        return response()->json(['mensaje'=>'Usuario cerro sesion']);
    }
}
