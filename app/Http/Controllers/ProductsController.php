<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Discount;

class ProductsController extends Controller
{
    public function index(){
        $recomended = Products::with('discount')->orderBy('sold','desc')->limit(10)->get();
        $discount_product = Discount::with('product')->get();
        $latest_product = Products::with('discount')->orderBy('id','desc')->limit(10)->get();
        return view('welcome')
                    ->with('recomended',$recomended)
                    ->with('discount_product', $discount_product)
                    ->with('latest_product',$latest_product);
    }
    public function product($id){
        $product = Products::where('id',$id)->first();
        return view('product')
                    ->with('product',$product);
    }
}
