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
        if ($request->isMethod('POST')) {
            // rules to validate form
            $rules = [
                'email' => 'required|email',
                'password' => 'required'
            ];

            // custom messages
            $customMessages = [
                'email.required' => 'you must fill in your email address',
                'email.email' => 'you must provide a valid email address',
                'password.required' => 'kindly fill in your password',
            ];

            $this->validate($request, $rules, $customMessages);


            // get form data
            $form_data = $request->all();

            // get credentials to check against form 
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

        return view('admin.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        // $request->
        return redirect()->route('home');
    }

    // update admin password
    public function updateAdminPassword(Request $request)
    {


        return view('admin.settings.update-admin-password');
    }
    // check password match
    public function checkPasswordMatch(Request $request)
    {

        if (Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
            return redirect()->route('admin.password.update')->with('success', 'Passwords match. You can now change your password');
        }
        return view('admin.settings.check-password-match');
    }
}
