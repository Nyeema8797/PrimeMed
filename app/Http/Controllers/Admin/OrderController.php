<?php
namespace App\Http\Controllers\Admin;
use App\OrderFormPrescription;
use App\OrderWithName;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function prescription_list(){
        $order = OrderFormPrescription::paginate(10);
        return view('admin.order.prescription-list',compact('order'));
    }
    public function delete($id){
        $order = OrderFormPrescription::find($id);
        $path = public_path('uploads/prescription/'.$order->imageName);
        if(file_exists($path)){
            unlink($path);
        }
        $order->delete();
        return redirect()->to('admin/order-with-prescription');
    }
    public function updateprescription(Request $request){
        $order = OrderFormPrescription::find($request->id);
        $order->status = $request->status;
        $order->totalPrice = $request->totalPrice;
        $order->save();
        return redirect()->to('admin/order-with-prescription');
    }
    public function medicine_name_list(){
        $order = OrderWithName::paginate(10);
        return view('admin.order.medicine-name-list',compact('order'));
    }
    public function deleteName($id){
        $order = OrderWithName::find($id);
        $order->delete();
        return redirect()->to('admin/order-with-name');
    }
    public function updateName(Request $request){
        $order = OrderWithName::find($request->id);
        $order->status = $request->status;
        $order->totalPrice = $request->totalPrice;
        $order->save();
        return redirect()->to('admin/order-with-name');
    }
    public function checkout_list()
    {
        $order = Order::paginate(10);
        return view('admin.order.checkout-list',compact('order'));
    }
    public function deleteCart($id){
        $order = Order::find($id);
        $order->products()->delete();
        $order->delete();
        return redirect()->to('admin/order-with-cart');
    }
    public function update(Request $request){
        $order = Order::find($request->id);
        $order->orderStatus = $request->orderStatus;
        $order->save();
        return redirect()->to('admin/order-with-cart');
    }
    public function invoice($id){
        $order = Order::find($id);
        return view('admin.order.invoice',compact('order'));
    }
}
