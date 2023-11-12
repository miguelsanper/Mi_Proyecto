<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function register(Request $request)
    {
        // Validar los datos
    
        $user = new User();
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        Auth::login($user);
    
        return redirect(route('historial'));
    }
    
    public function login(Request $request)
    {
        // Validar los datos del formulario de inicio de sesión
        $credentials = [
            "email" => $request, 
            'password' => $request->password,
            //"active" => 
        ];
    
        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember))
        {
            $request->session()->regenerate();

            return redirect()->intended(route('historial'));
        }
        else
        {
            return redirect('login');
        }
    }
    
    public function logout(Request $request)
    {
        // Lógica de cierre de sesión
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}