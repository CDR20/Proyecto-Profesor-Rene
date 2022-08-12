<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request){
        try {
            $user->update($request->all());
    
            return redirect()->route('users.index')->with('message', 'Usuario Actualizado Correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'Ocurrio un Error al Actualizar al Usuario Contacta a un Administrador');
        }
    }

    public function destroy(User $user){
        try {
            $user->delete();
    
            return redirect()->route('users.index')->with('message', 'Usuario Eliminado Correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'Ocurrio un Error al Eliminar al Usuario Contacta a un Administrador');
        }
    }
}