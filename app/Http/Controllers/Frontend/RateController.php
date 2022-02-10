<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function add(Request $request)
    {

        $star_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product_check) {

            $vertified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)->get();

            if ($vertified_purchase->count()>0) {

                $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if ($existing_rating) {
                    $existing_rating->star_rated = $star_rated;
                    $existing_rating->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'star_rated' => $star_rated,

                    ]);
                }
                return redirect()->back()->with('status', "Thank You for Rating for this product");
            } else {
                return redirect()->back()->with('status', "You can not rate a product without purchase");
            }
        } else {
            return redirect()->back()->with('status', "This link you follow was broken");
        }
    }
}
