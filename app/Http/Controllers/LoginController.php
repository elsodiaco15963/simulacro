<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login/login');
    }

    public function register(){
        return view('login/register');
    }

    public function store_user(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            're_password' => 'required|string|min:8|same:password',
            'clave' => 'required|string|min:4',
            're_clave' => 'required|string|min:4|same:clave',
            'dni' => 'required|string|regex:/^[0-9]{8}$/|unique:users',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->dni = $validatedData['dni'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->clave = Hash::make($validatedData['clave']);
        $user->save();

        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
    }

    public function recovery_before(){
        return view('login/recovery_before');
    }

    public function verify(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'clave' => 'required|string|min:4',
        ]);
    
        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['clave'], $user->clave)) {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }

        return redirect()->route('recovery', ['id' => $user->id]);
    }

    public function recovery($id)
    {
        $user = User::find($id);
        return view('login/recovery', compact('user'));
    }

    public function recovery_user(Request $request,$id)
    {
        $validatedData = $request->validate([
            'password' => 'required|string|min:8',
            're_password' => 'required|string|min:8|same:password',
        ]);

        $user = User::find($id);
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('login')->with('success', 'Contraseña actualizada exitosamente');
    }

    public function autenticacion(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->estado != 1) {
            return back()->withErrors(['error' => 'Tu cuenta está inactiva. Contacta al administrador.']);
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('start')->with('success', 'Conexión exitosa');
        } else {
            return back()->withErrors(['error' => 'Credenciales inválidas'])->withInput($request->only('email'));
        }
    }

    public function logout(Request $request){
        $user = Auth::user();
        Auth::logout();
        return view('login/login');
    }
}
