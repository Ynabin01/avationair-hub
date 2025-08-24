<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{


    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.login');
    }

  public function login(Request $request)
        {
            // Validate the input
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required|min:6',
            ]);
        
            // Attempt to authenticate the admin
            if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password])) {
                // Authentication passed, redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            }
        
            // Authentication failed, redirect back with an error message
            return redirect()->back()
                             ->withInput($request->only('name'))
                             ->withErrors([
                                 'name' => 'Invalid credentials.',
                             ]);
        }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
