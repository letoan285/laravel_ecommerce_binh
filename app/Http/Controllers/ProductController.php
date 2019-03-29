<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'tags'));
    }

    /** ORM
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->image = 'noimage.png';
        $product->product_code = $request->product_code;
        $product->list_price = $request->list_price;
        $product->sell_price = $request->sell_price;
        $product->stock = $request->stock;
        $product->supplier_id = $request->supplier_id;
        // dd($request->tag);
       if($product->save()) {

            // for($i = 0; $i< count($request->tag); $i++){
            //     DB::table('product_tag')->insert([
            //         'product_id' => $product->id,
            //         'tag_id'=> $request->tag[$i]
            //     ]);
            // }
            $product->tags()->sync($request->tag, false);

           return redirect()->route('products.index');
       }
    }

    public function show(Product $product, $id)
    {
        $product = Product::find($id);
        return view('admin.products.detail', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        // dd($product->id);
       $product = Product::find($id);
       if($product->delete()) {
           $product->tags()->detach();
           return redirect()->route('products.index');
       }
    }
}
