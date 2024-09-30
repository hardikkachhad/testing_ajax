<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::get();
        return view("admin.category.index",compact("category"));
    }

    public function create()
    {
        return view("admin.category.create");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryname' => 'required',
        ], [
            'categoryname.required' => 'Category Name Is Empty'
        ]);
        if ($validator->passes()) {
            $category = new Category;
            $category->category = $request->categoryname;
            $category->save();

            return response()->json([
                'status' => true,
                'errors' => $validator->errors()
            ]);
        }else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function changestatus(Request $request)
    {
        $status = Category::where('id',$request->id)->first();
        
        if ($status->status == 1) {
              $status->status = 0;
        } else {
            $status->status = 1;
        }
        $status->update();    
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->category = $request->categoryname;
        $category->update();
        return redirect()->route('category.index');
    }
}
