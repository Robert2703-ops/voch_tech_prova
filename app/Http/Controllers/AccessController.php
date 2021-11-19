<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccessController extends Controller
{
    // GET login
    public function loginView() {
        if ( Auth::check() ) {
            return redirect()->route('dashboard');
        }
        return view('Access.login');
    }

    // POST login
    public function login( Request $request ) {
        $data = $request->validate([
            'email' => 'required|min:4',
            'password' => 'required|min:6'
        ]);

        if ( Auth::attempt($data) ) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['message' => "User not found!"]);
    }

    // GET register
    public function registerView() {
        if ( Auth::check() ) {
            return redirect()->route('dashboard');
        }
        return view('Access.register');
    }

    // POST register
    public function register( Request $request ) {
        $data = $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|string|min:4|unique:users,email',
            'password' => 'required|string|confirmed|min:6'
        ]);
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make( $data['password'] )
        ]);

        return redirect()->route('login');
    }

    // GET dashboard
    public function dashboard() {
        if ( Auth::check() ) {
            $people = Person::all();
            $user = Auth::user();

            return view('Dashboard.dashboard', ['people' => $people, 'userName' => $user['name']]);
        }
        
    }

    // logout dashboard
    public function logout( Request $request ) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
