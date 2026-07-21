<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\SupplierProfile;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Mostrar formulario de registro
    |--------------------------------------------------------------------------
    */
    public function showRegister()
    {
        return view('auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | Registrar usuario
    |--------------------------------------------------------------------------
    */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        // Si es proveedor, crear perfil automáticamente
        if ($user->role === 'supplier') {

            SupplierProfile::create([
                'user_id' => $user->id,
            ]);
        }

        Auth::login($user);

        if ($user->role === 'supplier') {
            return redirect()->route('supplier.dashboard');
        }

        if ($user->role === 'entrepreneur') {
            return redirect()->route('entrepreneur.dashboard');
        }

        return redirect('/');
    }

    /*
    |--------------------------------------------------------------------------
    | Mostrar formulario de login
    |--------------------------------------------------------------------------
    */
    public function showLogin()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | Iniciar sesión
    |--------------------------------------------------------------------------
    */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'supplier') {
                return redirect()->route('supplier.dashboard');
            }

            if ($user->role === 'entrepreneur') {
                return redirect()->route('entrepreneur.dashboard');
            }

            return redirect('/');
        }

        return back()
            ->withErrors([
                'email' => 'Correo o contraseña incorrectos.',
            ])
            ->onlyInput('email');
    }

    /*
    |--------------------------------------------------------------------------
    | Cerrar sesión
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}