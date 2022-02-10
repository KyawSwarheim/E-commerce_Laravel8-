<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist',compact('wishlists'));
    }

    public function add(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id)){
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();          
                return response()->json(['status' => "Product added to Wishlist"]);     
            }else{
                return response()->json(['status' => "Product does not exists!"]);
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function  remove(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item Remove from Wishlist Successfully"]);
            }
         } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishlistcount]);
    }

}
