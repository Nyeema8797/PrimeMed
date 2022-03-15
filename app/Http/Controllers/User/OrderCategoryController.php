<?php

namespace App\Http\Controllers\User;
use App\Department;
use App\ProductCategory;
use App\Product;
use App\AllLab;
use App\TempOrder;
use App\OrderFormPrescription;
use App\OrderWithName;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;

class OrderCategoryController extends Controller
{
    public function order_category(){
        $depts = Department::all();
        $productcat = ProductCategory::all();
        //$product = Product::all();
        $labs = AllLab::all();
        return view('user.orderCategory.order_list',compact('depts','labs','productcat'));
    } 
    public function order_form(){
        $depts = Department::all();
        $labs = AllLab::all();
        return view('user.orderCategory.order-form',compact('depts','labs'));
    }
    
    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobileNo' => 'required',
            'deliveryAddress' => 'required',
            'medicineQuantity' => 'required',
            'imageName' =>'required',
        ]);
        $userID = Auth::user()->id;
        $order = new OrderFormPrescription();
        $order->name = $request->name;
        $order->user_id = $userID;
        $order->email = $request->email;
        $order->mobileNo = $request->mobileNo;
        $order->deliveryAddress = $request->deliveryAddress;
        $order->medicineQuantity = $request->medicineQuantity;
        if ($request -> hasFile('imageName')) {
            $extension = $request->imageName->extension();
            $fileName = str_slug($request ->name,'_').'_'.md5(date('Y-m-d H:i:s'));
            $fileName = $fileName.'.'.$extension;
            $order -> imageName = $fileName;
            $request -> imageName-> move('public/uploads/prescription',$fileName);
        }
        $order->save();
        return redirect()->back()->with(['masuma' => 'Your Order is confirmed!']);
    }
    public function saveName(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobileNo' => 'required',
            'deliveryAddress' => 'required',
            'medicineQuantity' => 'required',
        ]);
        $userID = Auth::user()->id;
        $order = new OrderWithName();
        $order->name = $request->name;
        $order->user_id = $userID;
        $order->email = $request->email;
        $order->mobileNo = $request->mobileNo;
        $order->deliveryAddress = $request->deliveryAddress;
        $order->medicineQuantity = $request->medicineQuantity;
        $order->save();
        return redirect()->back()->with(['zannat' => 'Your Order is confirmed!']);
    }
    public function cart_table(){
        $depts = Department::all();
        $labs = AllLab::all();
        $carts = TempOrder::where('sessionId', Cookie::get('unique_session'))->get();
        return view('user.orderCategory.cart_table',compact('depts','labs','carts'));
    }
    public function cart_delete($id){
        $cart = TempOrder::where('sessionId', Cookie::get('unique_session'))->where('id',$id)->first();
        $cart->delete();
        return redirect()->back();
    }
    public function cart_update($id){
        $cart = TempOrder::where('sessionId', Cookie::get('unique_session'))->where('id',$id)->first();
        $cart->save();
        return redirect()->back();
    }

    public function all_cart_delete(){
        TempOrder::where('sessionId', Cookie::get('unique_session'))->delete();
        return redirect()->to('user/order-category');
    }
    public function all_product()
    {
        $products = Product::orderBy('group','ASC')->get();
        $data = [];
        foreach($products as $row){
            $rowData['id'] = $row->id;
            $rowData['name'] = $row->name;
            $rowData['group'] = $row->group;
            $rowData['type'] = $row->type;
            $rowData['imageName'] = $row->imageName;
            $rowData['dose'] = $row->dose;
            $rowData['picesPerPata'] = $row->picesPerPata;
            $rowData['price'] = $row->price;
            $rowData['quantity'] = $row->quantity;
            $data[] = $rowData;
        }
        return response()->json($data);
    }
//category wise
    public function category_wise($id)
    {
        $products = Product::orderBy('group','ASC')->where('product_categories_id',$id)->get();
        $data = [];
        foreach($products as $row){
            $rowData['id'] = $row->id;
            $rowData['name'] = $row->name;
            $rowData['group'] = $row->group;
            $rowData['type'] = $row->type;
            $rowData['imageName'] = $row->imageName;
            $rowData['dose'] = $row->dose;
            $rowData['picesPerPata'] = $row->picesPerPata;
            $rowData['price'] = $row->price;
            $rowData['quantity'] = $row->quantity;
            $data[] = $rowData;
        }
        return response()->json($data);
    }
    public function itemSearch(Request $request){
        $search = $request->search;
        $table = Product::orderBy('name', 'ASC')->search($search)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['id'] = $row->id;
            $rowData['name'] = $row->name;
            $rowData['group'] = $row->group;
            $rowData['imageName'] = $row->imageName;
            $rowData['dose'] = $row->dose;
            $rowData['picesPerPata'] = $row->picesPerPata;
            $rowData['price'] = $row->price;
            $rowData['quantity'] = $row->quantity;
            $data[] = $rowData;
        }
        return response()->json($data);
    }

}
