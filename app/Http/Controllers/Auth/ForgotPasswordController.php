
<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;






class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails, ResetsPasswords;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        
        $response = Password::sendResetLink($request->only('email'));

    return $response == Password::RESET_LINK_SENT
        ? back()->with('status', trans($response))
        : back()->withErrors(['email' => trans($response)]);
}
    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with(['token' => $token]);
    }

    public function reset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Logica per resettare la password
        // ...
    }
}