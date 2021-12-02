<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helper\helper;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('Admin.Category.index' , get_defined_vars());
    }

    public function create()
    {
        return view('Admin.Category.add_category');
    }

    public function store(AddCategory $request)
    {
        // return $request ;
        if($request->has('Category_photo')){
            $file_name = SaveImage($request->Category_photo , 'images/category/');
            $store_category = Category::create([
                'name' => $request->Category_name,
                'image' => $file_name,
            ]);
        }else{
            $store_category = Category::create([
                'name' => $request->Category_name,
            ]);
        }
        if(!$store_category){
            return redirect()->route('category.index')->with("error" , "there id a proplem try again");
        }else{
            return redirect()->route('category.index')->with("success" , "Category added successufly");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('category.index')->with('error' , 'There is not exsited');
        }else{
            return view('Admin.Category.edit' , get_defined_vars());
        }
    }

    public function update(Request $request , $id)
    {
        $category = Category::find($id);
        if($request->has('Category_photo')){
            unlink($category->image);
            $file_name = SaveImage($request->Category_photo , 'images/category/');
            $update_category = $category->update([
                'name' => $request->Category_name,
                'image' => $file_name,
            ]);
        }else{
            $update_category = $category->update([
                'name' => $request->Category_name,
            ]);
        }
        if(!$update_category){
            return redirect()->route('category.index')->with("error" , "there id a proplem try again");
        }else{
            return redirect()->route('category.index')->with("success" , "Category updated successufly");
        }
    }

    public function DeleteCategory($id)
    {
        $category = Category::find($id);
        // return $category ;
        if(!$category){
            return redirect()->route('category.index')->with('error' , 'There is not exsited');
        }else{
            try {
                unlink($category->image);
                $delete_category = $category->delete();
                return redirect()->route('category.index')->with("success" , "Category deleted successufly");
            }catch (\Throwable $th) {
                return redirect()->route('category.index')->with("error" , "there id a proplem try again");
            }
        }

    }
}
