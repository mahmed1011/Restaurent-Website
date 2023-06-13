<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cart;

class UserCredential extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function signup()
    {
        return view('signup');
    }
    public function login()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();
        // $this->validate($request, [
        // "name" => "required|max:255",
        // "email" => "required|max:255|email",
        // "password" => "required"]);
        return redirect()->route('user.login')->with('message', 'Account Created Successfully');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) 
        {
            return redirect()->route('home');
        }
    }
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    //======== Google Login
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver(driver:'google')->redirect();
    // }

    // //======== Google Callback
    // public function handleGoogleCallback()
    // {
    //     $user = Socialite::driver(driver:'google')->user();
        
    //     $this-> store($request);
        
    //     // Return home after login
    //     return redirect()->route('home');

    // }
    
    //======== Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver(driver:'facebook')->redirect();
    }

    //======== Google Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver(driver:'Facebook')->user();
    }

}