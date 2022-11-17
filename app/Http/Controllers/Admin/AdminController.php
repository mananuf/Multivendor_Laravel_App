<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorBankDetail;
use App\Models\VendorsBusinessDetail;
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

    // update vendor details
    public function updateVendorDetails(Request $request, $slug)
    {
        if ($slug == "personal") {
            // post request
            if ($request->isMethod('POST')) {
                $rules = [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'address' => 'required',
                    'city' => 'required|regex:/^[\pL\s\-]+$/u',
                    'state' => 'required|regex:/^[\pL\s\-]+$/u',
                    'country' => 'required|regex:/^[\pL\s\-]+$/u',
                    'phone_number' => 'required|numeric'
                ];

                $customMessages = [
                    'name.required' => 'username field can\'t be left empty',
                    'name.regex' => 'username field doesn\'t accept special characters, numbers and spaces',
                    'address.required' => 'address field can\'t be left empty',
                    'city.required' => 'city field can\'t be left empty',
                    'city.regex' => 'city field doesn\'t accept special characters, numbers and spaces',
                    'state.required' => 'state field can\'t be left empty',
                    'state.regex' => 'state field doesn\'t accept special characters, numbers and spaces',
                    'country.required' => 'country field can\'t be left empty',
                    'country.regex' => 'country field doesn\'t accept special characters, numbers and spaces',
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

                // update admin records table
                Admin::where('id', Auth::guard('admin')->user()->id)
                    ->update([
                        'name' => $request->name,
                        'phone' => $request->phone_number,
                        'image' => $image_name
                    ]);

                // update admin records table
                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'name' => $request->name,
                        'address' => $request->address,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'phone' => $request->phone_number,
                    ]);
                return redirect()->back()->with('success', 'vendor details updated successfully!');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)
                ->first()
                ->get();
        } elseif ($slug == "business") {
            // post request
            if ($request->isMethod('POST')) {
                $rules = [
                    'shop_name' => 'required',
                    'shop_address' => 'required',
                    'shop_email' => 'required|email',
                    'shop_city' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_state' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_country' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_contact' => 'required|numeric',
                    'address_proof' => 'required',
                    'address_image' => 'required|image',
                    'business_license_number' => 'required',
                ];

                $customMessages = [
                    'shop_name.required' => 'shop name field can\'t be left empty',
                    'shop_address.required' => 'address field can\'t be left empty',
                    'shop_city.required' => 'city field can\'t be left empty',
                    'shop_city.regex' => 'city field doesn\'t accept special characters, numbers and spaces',
                    'shop_state.required' => 'state field can\'t be left empty',
                    'shop_state.regex' => 'state field doesn\'t accept special characters, numbers and spaces',
                    'shop_country.required' => 'country field can\'t be left empty',
                    'shop_country.regex' => 'country field doesn\'t accept special characters, numbers and spaces',
                    'shop_contact.required' => 'phone number field can\'t be left empty',
                    'shop_contact.numeric' => 'phone number must be numeric',
                    'shop_email.required' => 'email is required',
                    'shop_email.email' => 'email must be valid',
                    'address_proof' => "you must select a valid means of proof",
                    'business_license_number' => 'This field can\'t be left blank'
                ];
                $this->validate($request, $rules, $customMessages);

                // if the image field has an image
                if ($request->hasFile('address_image')) {
                    $image = $request->file('address_image');
                    if ($image->isValid()) {
                        $extension = $image->getClientOriginalExtension();
                        $image_name = rand(111222, 9778923) . '.' . $extension;

                        // save the file to 'image' field in Db, create a folder in public called companyImages & store images
                        $image_path = 'storage/address/address' . $image_name;
                        // dd($image_path);
                        Image::make($image)->resize('200', '200')->save($image_path);
                    }
                    // $image = $request->file('image')->store('admin', 'public');
                }

                // update vendor business records table
                VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'shop_name' => $request->shop_name,
                        'shop_address' => $request->shop_address,
                        'shop_city' => $request->shop_city,
                        'shop_state' => $request->shop_state,
                        'shop_country' => $request->shop_country,
                        'shop_contact' => $request->shop_contact,
                        'shop_email' => $request->shop_email,
                        'shop_website' => $request->shop_website,
                        'address_proof' => $request->address_proof,
                        'address_image' => $image_name,
                        'business_license_number' => $request->business_license_number,
                    ]);
                return redirect()->back()->with('success', 'vendor details updated successfully!');
            }

            $vendorDetails = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)
                ->first()
                ->get();
        } elseif ($slug == "bank") {
            // post request
            if ($request->isMethod('POST')) {
                $rules = [
                    'bank_name' => 'required',
                    'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'account_number' => 'required|numeric',
                ];

                $customMessages = [
                    'bank_name.required' => 'Bank name field can\'t be left empty',
                    'account_holder_name.required' => 'account holder\'s name field can\'t be left empty',
                    'account_holder_name.regex' => 'account holder\'s name field doesn\'t accept special characters, numbers and spaces',
                    'account_number.required' => 'account number field can\'t be left empty',
                    'account_number.numeric' => 'account number must be numeric',
                ];
                $this->validate($request, $rules, $customMessages);


                // update vendor bank records table
                VendorBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'bank_name' => $request->bank_name,
                        'account_holder_name' => $request->account_holder_name,
                        'account_number' => $request->account_number
                    ]);
                return redirect()->back()->with('success', 'vendor details updated successfully!');
            }

            $vendorDetails = VendorBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)
                ->first()
                ->get();
        }
        return view(
            'admin.settings.update-vendor-details',
            compact(
                'slug',
                'vendorDetails',
            )
        );
    }
}
