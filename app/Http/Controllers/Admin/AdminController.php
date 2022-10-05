<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if ($request->method('POST')) {
            // validate form
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            // get form data
            $form_data = $request->all();
            // get credentials
            $credentials = [
                'email' => $form_data['email'],
                'password' => $form_data['password'],
                'status' => 1
            ];

            // if credentials match
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'invalid credentials, try again');
            }
        }
        // echo Hash::make('superpass');
        return view('admin.login');
    }
}
