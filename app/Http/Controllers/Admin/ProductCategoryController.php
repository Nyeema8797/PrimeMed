<?php

namespace App\Http\Controllers\Admin;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function list(){
        $category = ProductCategory::paginate(10);
        return view('admin.productCategory.list',compact('category'));
    }
    public function create_product_category(){
        return view('admin.productCategory.create-product-cat');
    }
    public function save(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $category = new ProductCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->to('admin/product-category-list');
    }
    public function update_product_category($id){
        $category = ProductCategory::find($id);
        return view('admin.productCategory.update-product-cat',compact('category'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $category = ProductCategory::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->to('admin/product-category-list');
    }
    public function delete($id){
        $category = ProductCategory::find($id);
        $category->product()->delete();
        $category->delete();
        return redirect()->to('admin/product-category-list');
    }
}
