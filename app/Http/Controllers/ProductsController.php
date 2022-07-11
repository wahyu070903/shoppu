<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Discount;

class ProductsController extends Controller
{
    public function index(){
        $recomended = Products::with('discount')->orderBy('sold','desc')->limit(10)->get();
        $discount_products = Discount::with('product')->get();
        $latest_products = Products::with('discount')->orderBy('id','desc')->limit(10)->get();
        return view('app.welcome')
                    ->with('recomended',$recomended)
                    ->with('discount_products', $discount_products)
                    ->with('latest_products',$latest_products);
    }
    public function product($id){
        $product = Products::where('id',$id)->first();
        return view('app.product')
                    ->with('product',$product);
    }
}
