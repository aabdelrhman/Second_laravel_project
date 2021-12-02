<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request , $id){
        $item = Item::find($id);
        Cart::create([
            'item_id' => $id,
            'price' => $item->price,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back();
    }

    public function update(Request $request , $id){
        try {
            $cart_item  = Cart::find($id);
            if(!$cart_item){
                return redirect()->back();
            }
            $price = $cart_item->price/$cart_item->amount;
            $new_price = $price*$request->amount ;
            $cart_item->update([
                'amount' => $request->amount,
                'price' => $new_price
            ]);
            return redirect()->Route('cart');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            $cart_item  = Cart::find($id);
            if(!$cart_item){
                return redirect()->back();
            }
            $cart_item->delete();
            return redirect()->Route('cart');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function deleteCartItems($id){
        try {
            $cart_items  = Cart::where('user_id' , Auth::user()->id)->get();
            if(!$cart_items){
                return redirect()->back();
            }
            foreach($cart_items as $cart_item){
                $cart_item->delete();
            }
            return redirect()->Route('cart');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
