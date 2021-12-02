<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(){
        $offers = Item::where('offer' , '!=' , NULL)->with('getoffer','Images')->get();
        $oldest = Item::with('Images','getoffer')->oldest()->take(5)->get();
        $categorys = Category::with('item')->get();
        return view('site.index' , get_defined_vars());
        // return $categorys[0]->item[0] ;
    }

    public function about(){
        return view('site.about');
    }

    public function shop(){
        $categorys = Category::all();
        $items = Item::with('Images')->get();
        return view('site.shop' , get_defined_vars());
    }

    public function cart(){
        $cart_items = Cart::where('user_id' , Auth::user()->id)->with('item')->get();
        $subtutle = Cart::where('user_id' , Auth::user()->id)->sum('price');
        // return $cart_items ;
        return view('site.cart' , get_defined_vars());
    }

    public function checkout(){
        $count_cart = Cart::where('user_id' , Auth::user()->id)->count();
        if($count_cart > 0){
            return view('site.checkout');
        }else{
            return redirect()->back();
        }
    }

    public function detail($id){
        $item = Item::with('Images')->find($id);
        return view('site.detail' , get_defined_vars()) ;
    }

    public function contact(){
        return view('site.contact');
    }
}
