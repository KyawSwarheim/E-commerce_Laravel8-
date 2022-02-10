<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item){
            if (!Product::where('id', $item->prod_id)->where('qty','>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout',compact('cartItems'));
    }
    public function placeOrder(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'payment_method' => 'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->payment_method = $request->input('payment_method');


        //to calculate the total price
        $total = 0;
        $cartItems_tatol = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems_tatol as $prod){
            $total += $prod->products->selling_price * $prod->prod_qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'kyaw'.rand(1111,9999);
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id'=> $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1 == NULL){

            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->payment_method = $request->input('payment_method');
            $user->update();
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/my-orders')->with('status', "Order Placed Successfully");;
    }
}
