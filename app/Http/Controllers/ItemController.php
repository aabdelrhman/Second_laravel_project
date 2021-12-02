<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\item_images;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('Admin.Item.index' , get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.Item.add' , get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        try {
            if($request->has('Item_photo')){
                $item_id = Item::insertGetId([
                    'name' => $request->Item_name,
                    'cat_id' => $request->category,
                    'slug' => $request->Item_name,
                    'short_description' => $request->Item_sdescrioption,
                    'description' => $request->item_descrption,
                    'price' => $request->Item_price,
                ]);
                foreach($request->file('Item_photo') as $image){
                    $name=time().$image->getClientOriginalName();
                    $image->move('images/item',$name);
                    $images[] = $name ;
                }
                for ($x = 0; $x <= count($images)-1; $x++) {
                    item_images::create([
                        'image' =>  $images[$x],
                        'item_id' => $item_id
                    ]);
                  }
            }else{
                Item::create([
                    'name' => $request->Item_name,
                    'cat_id' => $request->category,
                    'slug' => $request->Item_name,
                    'short_description' => $request->Item_sdescrioption,
                    'description' => $request->item_descrption,
                    'price' => $request->Item_price,
                ]);
            }
            return redirect()->route('item.index')->with('success' , 'Item added successfly');
        } catch (\Throwable $th) {
            // return $th ;
            return redirect()->route('item.index')->with('error' , 'Thier a proplem ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::with('category')->find($id);
        $categories = Category::all();
        return view('Admin.Item.edit' , get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request , $id)
    {
        try {
            $item = Item::find($id);
            if(!$item){
                return redirect()->route('item.index')->with('error' , 'there is not existed');
            }
            $item->update([
                'name' => $request->Item_name,
                'cat_id' => $request->category,
                'slug' => $request->Item_name,
                'short_description' => $request->Item_sdescrioption,
                'description' => $request->item_descrption,
                'price' => $request->Item_price,
            ]);
            return redirect()->route('item.index')->with('success' , 'Item updated Successfly');
        } catch (\Throwable $th) {
            return redirect()->route('item.index')->with('error' , 'there is a problem');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function deleteitem($id)
    {
        try {
            $item = Item::with('Images')->find($id);
            $count_images = $item->Images->count();
            for ($i=0; $i < $count_images; $i++) {
                unlink('images/item/'. $item->Images[$i]->image);
            }
            $item->delete();
            return redirect()->route('item.index')->with('success' , 'Item deleted successfly');
        } catch (\Throwable $th) {
            return redirect()->route('item.index')->with('error' , 'there is a proplem try again');
        }

    }
}
