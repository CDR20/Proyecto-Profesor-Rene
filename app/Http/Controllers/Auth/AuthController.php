<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');


        if (Auth::guard('root')->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }else{
            return redirect()->route('login')->with('message', 'Credenciales de Acceso Incorrectas');
        }


    }

    public function logout( Request $request ){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function createAccount(Request $request){
        try {

            $this->validate($request,[
                'name' => 'required|string',
                'email' => 'required|unique:users,email',
                'password' => 'required'
            ]);

            if(!($request->password === $request->confirmPassword)){
                return redirect()->route('register')->with('error', 'Las contraseñas no coinciden');
            }

            $user = new User();

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));

            $user->save();

            return redirect()->route('login')->with('message', 'Inicia sesion con tu nueva cuenta');
        } catch (\Throwable $th) {
            return redirect()->route('register')->with('error', 'No se ah podido registrar al usuario');
        }
    }

    public function restorePassword(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['message' => 'Revisa tu correo para seguir con el proceso'])
                : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('message', 'Tu contreña ah sido restaurada')
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
