<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
class ResetPasswordController extends Controller
{
    






public function reset(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $response = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    );

    return $response == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', trans($response))
        : back()->withErrors(['email' => trans($response)]);
}
}
