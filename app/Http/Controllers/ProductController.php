<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index() 
    {
        // $products = Product::all();
        $products = [
            ['id' => 1, 'name' => 'product 1','price' => 20000],
            ['id' => 2, 'name' => 'product 2','price' => 40000],
            ['id' => 3, 'name' => 'product 3','price' => 30000]
        ];
        //return $products;
        return view('contact', compact('products'));
    }
}
