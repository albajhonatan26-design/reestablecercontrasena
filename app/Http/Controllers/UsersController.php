<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
class UsersController extends Controller
{
    //
    
    // 1. Muestra el formulario para pedir el correo
    public function showLinkRequestForm()
    {
        return view('password.request');
    }

    // 2. Procesa el envío del correo con el token
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Laravel genera el token y envía el mail automáticamente
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // 3. Muestra el formulario donde el usuario pone la nueva clave
    public function showResetForm(Request $request, $string, $token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // 4. Valida el token y actualiza la contraseña
    public function reset(Request $request)
    {
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
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}

