<?php

namespace App\Http\Controllers\User;
use App\Department;
use App\AllLab;
use App\TempOrder;
use App\Order;
use App\OrderItems;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function checkout_details(){
        $depts = Department::all();
        $labs = AllLab::all();
        $carts = TempOrder::where('sessionId', Cookie::get('unique_session'))->get();
        return view('user.orderCategory.checkout-details',compact('depts','labs','carts'));
    }
    public function savecart(Request $request){
        $tempTable = TempOrder::where('sessionId', Cookie::get('unique_session'))->where('quantity', '>', 0)->get();

        if(count($tempTable) > 0) {
            $request_date = $request->deliveryDate.' '.$request->deliveryTime;
            $today = date("Y-m-d H:i:s", strtotime("+30 minutes"));

            $today_time = strtotime($today);
            $delivery_time = strtotime($request_date);

                if($delivery_time > $today_time){
                    $temp_amount = 0;

                    foreach ($tempTable as $row) {
                        $temp_amount += ($row->quantity * $row->price);
                    }
                    $userID = Auth::user()->id;

                    DB::beginTransaction();
                    try{
                        $orders = new Order();
                        $orders->user_id = $userID;
                        // $orders->deliveryCharge = $request->deliveryCharge;
                        $orders->paidAmount = $temp_amount;
                        $orders->address = $request->deliveryAddress;
                        $orders->contactNo = $request->contactNo;
                        $orders->paymentType = $request->paymentType;
                        $orders->description = $request->orderInstructions;
                        $orders->deliveryDate = db_date($request->deliveryDate).' '.date('h:i:s', strtotime($request->deliveryTime));
                        //$orders->deliveryDate = $request->deliveryDate;
                        //$orders->deliveryTime = $request->deliveryTime;
                        $orders->save();

                        $orderID = $orders->id;
                        $total_amount = 0;

                        foreach ($tempTable as $row) {
                            //Add to purchase Item Table
                            $order_item = new OrderItems();
                            $order_item->order_id = $orderID;
                            $order_item->product_id = $row->product_id;
                            $order_item->quantity = $row->quantity;
                            $order_item->price = $row->price;
                            $order_item->save();
                            //$total_amount += ($row->quantity * $row->price);

                            //$orderItemID = $order_item->orderItemID;


                        }
                        TempOrder::where('sessionId', Cookie::get('unique_session'))->delete();

                            DB::commit();
                        } catch (\Throwable $e) {
                            DB::rollback();
                            throw $e;
                        }

                        return redirect()->to('user/order-category')->with(['message' => 'Your order placed successfully!!']);
                }else {
                    return back()->with(['message' => 'Please Select Proper Delivery Date and Time.!!']);
            }
        }else{
            TempOrder::where('sessionId', Cookie::get('unique_session'))->delete();
            return redirect()->to('/');
        }
    }
}


            
        