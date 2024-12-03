<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        if (Auth::guard('admin')->check()) {
            
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {

            $user = Auth::guard('admin')->user();

            if ($user && $user->role_id === 1) {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            }
            else {
                Auth::guard('admin')->logout();
            }
        }

        return back()->withErrors([
            'email' => 'You do not have the required permissions to access the admin panel.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
}
