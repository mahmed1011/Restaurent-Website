<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Food;
use App\Models\User;
use App\Models\Order;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $total_food = Food::all()->count();
        $total_users = User::where('rol_as','0')->get()->count();
        $total_orders = Order::all()->count();
        $order = Order::all();
        $total = 0;

        foreach($order as $order)
        {
            $total += $order->price * $order->quantity;
        }
        
        $total_delivered = Order::where('delivery_status','=','delivered')->get()->count();
        $total_processing = Order::where('delivery_status','=','processing')->get()->count();

        return view('admin.admin-dashboard',compact('total_food','total_users','total_orders','total','total_delivered','total_processing'));
    }
    public function login()
    {
        return view('admin.login');
    }
    public function authenticate()
    {
        if(Auth::user()->rol_as == '1') //1=admin
        {
            return redirect()->route('admin.dashboard')->with('status','Welcome Admin');
        }
        elseif(Auth::user()->role_as == '0') //0=user
        {
            return redirect()->route('home')->with('status','Logged In Successfully');
        }
    }
    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');


    //     if (Auth::guard('web')->attempt($credentials)) {
    //         return redirect()->route('admin.dashboard');
    //     }
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}