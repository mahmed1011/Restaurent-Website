<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Food;
use App\Models\Chef;
use App\Models\User;
use App\Models\Cart;
use App\Models\Breakfast;
use App\Models\Lunch;
use App\Models\Dinner;
use RealRashid\SweetAlert\Facades\Alert; 


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
// public $totalPrice = 0;

    public function index()
    {
        if(Auth::id())
        {
            $foods = food::paginate(4);
        // $chefs = chef::paginate(3);
        $chefs = chef::all();
        $breakfasts = Breakfast::all();
        $lunchs = Lunch::all();
        $dinners = Dinner::all();
        $user = auth()->user();
        $counts = Cart::where('email',$user->email)->count();
        return view('index',compact('foods','counts','chefs','breakfasts','lunchs','dinners'));
           
        }
        // if (Auth::guest()) 
        // {
        //     return Redirect::route('user.login');
        // }
        else
        $foods = food::paginate(4);
        // $chefs = chef::paginate(3);
        $chefs = chef::all();
        $breakfasts = Breakfast::all();
        $lunchs = Lunch::all();
        $dinners = Dinner::all();
        return view('index',compact('foods','chefs','breakfasts','lunchs','dinners'));
    }
    // public function authenticate()
    // {
    //     $foods = food::paginate(4);
    //     // $chefs = chef::paginate(3);
    //     $chefs = chef::all();
    //     $breakfasts = Breakfast::all();
    //     $lunchs = Lunch::all();
    //     $dinners = Dinner::all();
    //     $usertype = Auth::user()->usertype;
    //     if ($usertype == '1') 
    //     {
    //         return view('admin.admin-dashboard');
    //     } else 
    //     {
    //         // $user = auth()->user();
    //         // $counts = Cart::where('email',$user->email)->count();

    //         return view('index',compact('foods','chefs','breakfasts','lunchs','dinners'));
    //     }
    // }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user  = auth()->user();
            // dd($user_id);
            $cart = new Cart;
            $food = Food::find($id);
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->heading = $food->heading;
            $cart->discription = $food->discription;
            $cart->image = $food->image;
            $cart->price = $food->price;
            $cart->quantity = $request->quantity;
            $cart->user_id = $user->id;
            $cart->save();
            Alert::success('Product Added Successfully','We have added Product to the cart');
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $foods = food::paginate(4);
            return view('index',compact('foods'));
        }
        $foods = Food::where('heading','Like','%'.$search.'%')->get();

        return view('index',compact('foods'));
    }
    // public function checkout()
    // {
    //     return view('user.checkout');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        $user = auth()->user();
        $carts = Cart::where('email',$user->email)->get();
        $counts = Cart::where('email',$user->email)->count();

        return view('user.show-cart',compact('counts','carts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        return view('user.checkout');
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
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('show.cart.items')->with('message','Item Deleted Successfully');
    }
}