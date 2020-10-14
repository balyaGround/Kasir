<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view('admin.login');
        } else {
            return redirect()->route('index');
        }
    }

    public function loginProcess(Request $request)
    {

        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
