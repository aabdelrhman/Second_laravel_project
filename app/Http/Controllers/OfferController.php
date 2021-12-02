<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Item;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index(){
        $items = Item::whereNotNull('offer')->with('getoffer')->get();
        return view('Admin.Offer.index' , get_defined_vars());;
    }

    public function create(){
        $items = Item::all();
        return view('Admin.Offer.add' , get_defined_vars());
    }

    public function store(OfferRequest $request){
        try {
            $item = Item::find($request->item_id);
            if(!$item){
                return redirect()->route('offer_index')->with('error' , 'Thier is a problem no item with this id');
            }
            if($item->offer == null){
                DB::beginTransaction();
                $date = str_replace('-', '/', $request->date_expired);
                $offer = Offer::insertGetId([
                    'offer_percent' => $request->percent,
                    'new_price' => $request->new_price,
                    'date_expired' => $date." ".date('H:m:s'),
                ]);
                $item->update([
                    'offer' => $offer
                ]);
                DB::commit();
                return redirect()->route('offer_index')->with('success' , 'Stored');
            }else{
                return redirect()->route('offer_index')->with('error' , 'thier are an offer for this item');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return $th ;
            // return redirect()->route('offer_index')->with('error' , 'Thier is a problem');
        }

    }

    public function delete($id){
        try {
            $item = Item::find($id);
            if(!$item){
                return redirect()->route('offer_index')->with('error' , 'Thier is a problem no item with this id');
            }
            DB::beginTransaction();
            $offer = Offer::find($item->offer);
            $item->update([
                'offer' => NULL
            ]);
            $offer->delete();
            DB::commit();
            return redirect()->route('offer_index')->with('success' , 'Deleted');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('offer_index')->with('error' , 'Thier is a problem');
        }

    }

    public function get_price($id){
        $price = Item::find($id);
        return json_encode($price->price);
    }
}
