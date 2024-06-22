<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all(){
        $Products = Product::all();
        return view('panel.allproducts')->with("products",$Products);
    }

    public function show($id){
        $Product = Product::where('id' , $id)->first();
        return view('panel.product-details')->with("product",$Product);
    }


    public function add(){
        $categories = Category::all();
        return view ('panel.addproduct')->with("categories",$categories);
    }

    public function update($id){
        $product = Product::where("id",$id)->first();
        $categories = Category::all();
        return view ('panel.updateproduct')->with("product",$product)->with("categories" , $categories);
    }


    public function store(Request $request){
       $data =  $request->validate([
            "name"=>"required|string",
            "desc"=>"required|string",
            "price"=>"required",
            "quantity"=>"required|numeric",
            "image"=>"required|image|mimes:jpg,png,jpeg,gif",
            "category_id"=>"required"
        ]);

        $data["image"] =   Storage::putFile("products",$request->image);
        

        Product::create($data);
        session()->flash("success" , "product inserted succeffully");
        return redirect(url('products/all'));
    }


    public function pupdate(Request $request , $id){
        $data =  $request->validate([
             "name"=>"required|string",
             "desc"=>"required|string",
             "price"=>"required",
             "quantity"=>"required|numeric",
             "image"=>"image|mimes:jpg,png,jpeg,gif",
             "category_id"=>"required"
         ]);
         $product =    Product::findOrFail($id);
         if($product){
            if($request->hasFile("image")){
                Storage::delete($product->image);
                $data["image"] =   Storage::putFile("products",$request->image);
            }
         }
        
         
 
         $product->update($data);
         session()->flash("success" , "product updated succeffully");
         return redirect(url('products/all'));
     }


     public function delete($id){
        $Product = Product::findOrFail($id);
        if($Product){
            Storage::delete($Product->image);
            $Product->delete();
        }
        return redirect(url('products/all'));
    }

    public function updateQuantity(Request $request, $id) {
        // Validate the incoming request data
        $data = $request->validate([
            'quantity' => 'required|numeric',
        ]);
    
        // Find the product by ID or fail if it does not exist
        $product = Product::findOrFail($id);
    
        // Check if the product quantity is sufficient
        if ($product->quantity <= 0) {
            session()->flash('fail', 'No quantity in store');
            return redirect()->back();
        }
    
        // Check if the requested quantity is greater than available quantity
        if ($data['quantity'] > $product->quantity) {
            session()->flash('fail', 'Requested quantity exceeds available quantity');
            return redirect()->back();
        }
    
        // Reduce the product quantity
        $product->quantity -= $data['quantity'];
    
        // Save the updated product
        $product->save();
    
        // Redirect back to the product show page with success message
        session()->flash('success', 'Quantity updated successfully');
        return redirect()->back();
    }
    
}
