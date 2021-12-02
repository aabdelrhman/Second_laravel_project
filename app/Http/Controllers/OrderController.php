<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(OrderRequest $request){
        try {
            DB::beginTransaction();
            $order_id = Order::insertGetId([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'addres' => $request->add,
                'city' => $request->city,
                'user_id' => Auth::user()->id,
            ]);
            $cart_items = Cart::where('user_id' , Auth::user()->id)->get();
            if($cart_items && $cart_items->count() > 0){
                $cart_array = [] ;
                foreach($cart_items as $item){
                    $cart_array[] = [
                        'order_id' => $order_id,
                        'item_id' => $item->item_id,
                        'price' => $item->price,
                        'amount' => $item->amount,
                    ];
                }
                OrderItems::insert($cart_array);
            }
            foreach($cart_items as $item){
                $item->delete();
            }
            DB::commit();
            return redirect()->route('shop');
        } catch (\Throwable $th) {
            DB::rollback();
            return $th ;
        }
    }

    public function index(){
        $orders = Order::where('accepted' , 0)->get();
        return view('Admin.Order.index' , get_defined_vars());
    }

    public function order_done(){
        $orders = Order::where('accepted' , 1)->get();
        return view('Admin.Order.index' , get_defined_vars());
    }

    public function order_archife(){
        $orders = Order::where('accepted' , 2)->get();
        return view('Admin.Order.index' , get_defined_vars());
    }

    public function show($id){
        $items = OrderItems::where('order_id' , $id)->with('items','order')->get();
        return view('Admin.Order.show' , get_defined_vars());
    }

    public function accepted($id){
        try {
            $order = Order::find($id);
            if(!$order){
                return redirect()->route('order_index')->with('error' , 'No order with this id');
            }
            $order->update([
                'accepted' => 1,
            ]);
            return redirect()->route('order_index')->with('success' , 'Order DONE !');
        } catch (\Throwable $th) {
            return redirect()->route('order_index')->with('error' , 'THier is a problem !!');
        }
    }

    public function refused($id){
        try {
            $order = Order::find($id);
            if(!$order){
                return redirect()->route('order_index')->with('error' , 'No order with this id');
            }
            $order->update([
                'accepted' => 2,
            ]);
            return redirect()->route('order_index')->with('success' , 'Order Archifed !');
        } catch (\Throwable $th) {
            return redirect()->route('order_index')->with('error' , 'THier is a problem !!');
        }
    }

    public function delete_order($id){
        try {
            $order = Order::with('order_items')->find($id);
            if(!$order){
                return redirect()->route('order_index')->with('error' , 'No order with this id');
            }
            foreach($order->order_items as $item){
                $item->delete();
            }
            $order->delete();
            return redirect()->route('order_index')->with('success' , 'Order Deleted !');
        } catch (\Throwable $th) {
            return redirect()->route('order_index')->with('error' , 'THier is a problem !!');
        }
    }


}
