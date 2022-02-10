<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status','0')->get();
        return view('admin.order.index',compact('orders'));
    }
    public function view($id){
        $orders = Order::where('id', $id)->first();
        return view('admin.order.view',compact('orders'));
    }
    public function updateOrder(Request $request,$id){
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status',"Order updated Successfully");
    }
    public function orderHistory(){
        $orders = Order::where('status','1')->get();
        return view('admin.order.orderHistory',compact('orders'));
    }
    static function newOrder()
    {
        return Order::where('status','0')->count();
    }
    static function completeOrder()
    {
        return Order::where('status','1')->count();
    }
    static function allOrder()
    {
        return Order::all()->count();
    }
}
