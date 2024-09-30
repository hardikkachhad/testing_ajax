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
        return view("admin.product.index");
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
            'images' => 'required',
        ],[
            "category"=> "Category is Empty",
            "product" => "Product name is Empty",
            "sale"=> "sale price is Empty",
            "image"=> "image is Empty",
            'images' => 'product images is Empty',
        ]);

        if ($validate->passes()) {
           $product = new Product;
           $product->category_id = $request->category;
           $product->pname = $request->product;
           $product->pprice = $request->sale;
           if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move
            # code...
           }
        } else {
           return response()->json([
                'status' =>false,
                'errors' => $validate->errors()
           ]);           
        }
        
    }

}
