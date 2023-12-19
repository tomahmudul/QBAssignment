<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function allproducts(){
        $products = Product::all();

        return view("admin.product");
    }

    public function addproduct(Request $request){
        return view("admin.addproduct");
    }

    public function sales(Request $request){
        return view("admin.sales");
    }

}
