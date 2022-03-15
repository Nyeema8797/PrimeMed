<?php

namespace App\Http\Controllers\Admin;
use App\ProductCategory;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function list(){
        $product = Product::paginate(10);
        return view('admin.product.list',compact('product'));
    }
    public function create_product(){
        $category = ProductCategory::all();
        return view('admin.product.create-product',compact('category'));
    }
    public function save(Request $request){
        $request->validate([
            'product_categories_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $product = new Product();
        $product->product_categories_id = $request->product_categories_id;
        $product->name = $request->name;
        $product->group = $request->group;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->piecesPerPata = $request->piecesPerPata;
        $product->dose = $request->dose;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->description = $request->description;
        if($request->hasFile('imageName')){
            $extension = $request->imageName->extension();
            $fileName = str_slug($request->name,'_').'_'.md5(date('y-m-d h:i:s'));
            $fileName = $fileName.'.'.$extension;
            $product->imageName = $fileName;
            $request->imageName->move('public/uploads/product',$fileName);
        }
        $product->save();
        return redirect()->to('admin/product-list');
    }
    public function update_product($id){
        $product = Product::find($id);
        $category = ProductCategory::all();
        return view('admin.product.update-product',compact('product','category'));
    }
    public function update(Request $request){
        $request->validate([
            'product_categories_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $product = Product::find($request->id);
        $product->product_categories_id = $request->product_categories_id;
        $product->name = $request->name;
        $product->group = $request->group;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->piecesPerPata = $request->piecesPerPata;
        $product->dose = $request->dose;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->description = $request->description;
        $path = public_path('uploads/product/'.$product->imageName);
        if(file_exists($path)){
            unlink($path);
        }
        if($request->hasFile('imageName')){
            $extension = $request->imageName->extension();
            $fileName = str_slug($request->name,'_').'_'.md5(date('y-m-d h:i:s'));
            $fileName = $fileName.'.'.$extension;
            $product->imageName = $fileName;
            $request->imageName->move('public/uploads/product',$fileName);
        }
        $product->save();
        return redirect()->to('admin/product-list');
    }
    public function delete($id){
        $product = Product::find($id);
        $path = public_path('uploads/product/'.$product->imageName);
        if(file_exists($path)){
            unlink($path);
        }
        $product->orderItem()->delete();
        $product->tempOrder()->delete();
        $product->delete();
        return redirect()->to('admin/product-list'); 
    }
    
}
