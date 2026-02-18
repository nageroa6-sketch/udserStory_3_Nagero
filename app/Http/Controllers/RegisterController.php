


<?php


namespace App\Http\Controllers\Auth;






use App\Http\Controllers\Controller;
use App\Models\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
       $this->validator($request->all())->validate();
    
    Authenticate::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'is_revisor' => false,
        
        // Impostazione predefinita
    ]);

    return redirect()->route('login')->with('success', 'Registrazione completata! Accedi ora.');
}

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|unique:authenticates',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}