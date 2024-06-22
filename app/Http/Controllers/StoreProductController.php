<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreProductController extends Controller
{
    public function all(){
      $products =  Product::all();
        return view('pages.products')->with("products" , $products);
    }
}
