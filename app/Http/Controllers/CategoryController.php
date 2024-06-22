<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(){
        $categories = Category::all();
        return view("panel.allcategories")->with("categories",$categories);
    }

    public function show($id){
        $category = Category::where('id',$id)->first();
        return view("panel.categorydetails")->with("category",$category);
    }

    public function add(){
        return view("panel.addcategory");
    }

    public function update($id){
        $category = Category::where('id',$id)->first();
        return view("panel.updatecategory")->with("category",$category);
    }

    public function catupdate(Request $request ,$id){
        $data = $request->validate([
            "name" => "required|string|max:100",
            "desc" => "required|string"
        ]);
        $category = Category::find($id);

        if ($category) {
            $category->update($data);
        }
        return redirect(url('categories/all'));
    }

public function store(Request $request)
    {
    // Validate the request data
    $data = $request->validate([
        "name" => "required|string|max:100",
        "desc" => "required|string"
    ]);

    // Create a new category using the validated data
    $category = Category::create($data);

    // Flash a success message to the session
    session()->flash("success", "Category added successfully");

    // Redirect to a specific URL after successful addition
    return redirect(url("categories/all"));
   }

   public function delete($id){
    $category = Category::findOrFail($id);

    if($category){
        $category->delete();
    }

    return redirect(url("categories/all"));
}
}
