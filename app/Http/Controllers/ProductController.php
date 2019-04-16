<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use DB;

class ProductController extends Controller
{

    protected $model;

    public function __construct(Product $products)
    {
        $this->model = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize == null ? 20 : $request->pageSize;
        $keyword = $request->keyword;
        $path = "";
        if(!$keyword) {
            $products = Product::paginate($pageSize);
            $path.= "?pageSize=$pageSize";
        }else {
            $products = Product::where('name', 'like', "%$keyword%")
                                ->orwhere('description', 'like', "%$keyword%")
                                ->paginate($pageSize);
            $path .= "?pageSize=$pageSize&keyword=$keyword";
        }
        $products->withPath($path);
        return view('admin.products.index', compact('products', 'keyword', 'pageSize'));
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
        $product = $this->model->find($id);
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
    public function getProductApi()
    {
        return $this->model->all();
    }
    public function postProductApi(Request $request)
    {
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

           return response(200);
       }
    }
    public function deleteProductApi(Request $request, $id)
    {
         // dd($product->id);
       $product = Product::find($id);
       if($product->delete()) {
           $product->tags()->detach();
           return response("Xoa Thanh Cong");
       }else {
        return response("Xoa That bai");
       }
    }
    public function getOneProductApi(Request $request, $id) 
    {
        return Product::findOrFail($id);
         
    }
    public function putProductApi(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->image =  $request->image;
        $product->product_code = $request->product_code;
        $product->list_price = $request->list_price;
        $product->sell_price = $request->sell_price;
        $product->stock = $request->stock;
        $product->supplier_id = $request->supplier_id;
        // dd($request->tag);
       if($product->update()) {

           return $product;
           
       } else {
        return response("Xoa That Bai");
       }

    }
}
