<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Session;

use Stripe;

class StripePaymentController extends Controller
{
    public function stripe($total)
    {
        $user = auth()->user();
        $counts = Cart::where('email', $user->email)->count();
        return view('user.stripe', compact('counts', 'total'));
    }



    public function stripePost(Request $request, $total)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $total * 100,
            "currency" => "pkr",
            "source" => $request->stripeToken,
            "description" => "Thanks For Payment"
        ]);
        $user = auth()->user();
        $user_id = $user->id;
        $data = cart::where('user_id', '=', $user_id)->get();
        foreach ($data as $data) {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;


            $order->heading = $data->heading;
            $order->discription = $data->discription;
            $order->image = $data->image;
            $order->price = $data->price;
            $order->quantity = $data->quantity;

            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->route('show.cart.items')->with('message', 'Payment has been successfully');
    }
    public function cash_delivery()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $data = cart::where('user_id', '=', $user_id)->get();
        foreach ($data as $data) {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;


            $order->heading = $data->heading;
            $order->discription = $data->discription;
            $order->image = $data->image;
            $order->price = $data->price;
            $order->quantity = $data->quantity;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'we have Recived your Order,We will connect with  you soon......');
    }
}
