<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->orderBy("id","desc")->paginate(10);
        return view("admin.product.index",compact("products"));
    }
    public function create(){
        $category = Category::get();
        return view("admin.product.create",compact("category"));
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            "category"=> "required",
            "product" => "required",
            'sale' => 'required',
            'image'=> 'required',
            // 'images' => 'required',
        ],[
            "category"=> "Category is Empty",
            "product" => "Product name is Empty",
            "sale"=> "sale price is Empty",
            "image"=> "image is Empty",
            // 'images' => 'product images is Empty',
        ]);

        if ($validate->passes()) {
           $product = new Product;
           $product->category_id = $request->category;
           $product->pname = $request->product;
           $product->pprice = $request->sale;
           if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move('admin_assets/uploads/',$filename);
            $product->image = $filename;# code...
           }
           $product->save();
           return response()->json([
            'status' => true,
            'errors' => $validate->errors()
        ]);
        } else {
           return response()->json([
                'status' =>false,
                'errors' => $validate->errors()
           ]);           
        }
        
    }

}
