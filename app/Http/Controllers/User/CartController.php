<?php

namespace App\Http\Controllers\User;
use App\TempOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add_cart(Request $request){

        $isExist = TempOrder::where('sessionId', Cookie::get('unique_session'))
        ->where('product_id', $request->productID)->first();
    
            if($isExist == null){
                $table = new TempOrder();
                $table->sessionId = Cookie::get('unique_session');
                $table->product_id = $request->productID;
                $table->price = $request->price;
                $table->quantity = 1;
                $table->save();
            }else{
                $old_qty = $isExist->quantity;
                TempOrder::where('sessionID', Cookie::get('unique_session'))
                ->where('product_id', $request->productID)->update(['quantity' => ($old_qty + 1)]);
            }
    
            return 0;
    
       }

       public function remove_cart(Request $request){

        $isExist = TempOrder::where('sessionId', Cookie::get('unique_session'))
        ->where('product_id', $request->productID)->first();
    
        if($isExist != null){
            $old_qty = $isExist->quantity;
    
            if($old_qty == 1){
                TempOrder::where('sessionId', Cookie::get('unique_session'))
                ->where('product_id', $request->productID)->delete();
            }else{
                TempOrder::where('sessionId', Cookie::get('unique_session'))
                ->where('product_id', $request->productID)->update(['quantity' => ($old_qty - 1)]);
            }
        }
    
        return 0;
    
       }

       public function get_temp_order(){
        $table = TempOrder::where('sessionId', Cookie::get('unique_session'))->sum('quantity');
        return $table;
    }
    
    
}
