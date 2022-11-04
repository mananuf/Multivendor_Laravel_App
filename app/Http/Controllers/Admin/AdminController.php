<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

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

    // check password match
    public function checkPasswordMatch(Request $request)
    {
        if ($request->isMethod('post')) {
            if (Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
                return redirect()->route('admin.password.update')->with('success', 'Passwords match. You can now change your password');
            }
            return redirect()->back()->withErrors('passwords does not match');
        }
        return view('admin.settings.check-password-match');
    }

    // update admin password
    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $form_data = $request->validate([
                'new_password' => 'required',
                'password_confirmation' => 'required'
            ]);

            if ($request->new_password === $request->password_confirmation) {
                Admin::where('id', Auth::guard('admin')->user()->id)
                    ->update(['password' => Hash::make($request->new_password)]);
                return redirect()->route('admin.dashboard')->with('success', 'password was updated');
            }
            return redirect()->back()->withErrors('passwords does not match');
        }
        return view('admin.settings.update-admin-password');
    }


    // update admin details
    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'phone_number' => 'required|numeric'
            ];

            $customMessages = [
                'name.required' => 'username field can\'t be left empty',
                'name.regex' => 'username field doesn\'t accept special characters, numbers and spaces',
                'phone_number.required' => 'phone number field can\'t be left empty',
                'phone_number.numeric' => 'phone number must be numeric'
            ];
            $this->validate($request, $rules, $customMessages);

            // if the image field has an image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $image_name = rand(111222, 9778923) . '.' . $extension;

                    // save the file to 'image' field in Db, create a folder in public called companyImages & store images
                    $image_path = 'storage/admin/' . $image_name;
                    // dd($image_path);
                    Image::make($image)->resize('200', '200')->save($image_path);
                }
                // $image = $request->file('image')->store('admin', 'public');
            }

            Admin::where('id', Auth::guard('admin')->user()->id)
                ->update([
                    'name' => $request->name,
                    'phone' => $request->phone_number,
                    'image' => $image_name
                ]);

            return redirect()->route('admin.dashboard')->with('success', 'details were updated');
        }
        return view('admin.settings.update-admin-details');
    }
}
