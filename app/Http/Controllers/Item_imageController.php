<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\item_images;
use Illuminate\Http\Request;

class Item_imageController extends Controller
{
    public function show_image($id){
        $images = item_images::where('item_id' , $id)->get();
        $item_id = $id ;
        return view('Admin.Item.item_image' , get_defined_vars()) ;
    }

    public function add_image($id){
        $item_id = $id ;
        return view('Admin.Item.add_image' , get_defined_vars());
    }

    public function store_image(Request $request , $id){
        try {
            $item = Item::find($id);
            if(!$item){
                return redirect()->route('item.index')->with('error'  , 'There is not found this item');
            }
            if($request->hasFile('item_photo')){
                $image  = $request->file('item_photo');
                $name=time().$image->getClientOriginalName();
                $image->move('images/item',$name);
                item_images::create([
                    'image' =>  $name,
                    'item_id' => $id
                ]);
                return redirect()->route('show_image', $id)->with('success'  , 'Photo Added successfly');
            }
        } catch (\Throwable $th) {
            return redirect()->route('item.index')->with('error'  , 'There is a proplem');
            // return $th ;
        }

    }

    public function delete_image($id){
        $image = item_images::find($id);
        if(!$image){
            return redirect()->route('item.index')->with('error'  , 'There is not found this image');
        }
        try {
            unlink('images/item/'.$image->image);
            $delete_category = $image->delete();
            return redirect()->route('item.index')->with("success" , "Image Item deleted successufly");
        }catch (\Throwable $th) {
            return redirect()->route('item.index')->with("error" , "there id a proplem try again");
        }
    }
}
