<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
 
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->where('status', 1)->get();

        return view('admin.categories.index', compact('categories'));
    }
    public function dashboard() {
        
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->where('status', 1)->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $category = $request->all();

        if(!$category['parent_id'] || $category['parent_id'] == null) {
            $parent_id = 0;
        }else {
            $parent_id = $category['parent_id'];
        }

        DB::table('categories')->insert(
            [
                'name' => $category['name'],
                'slug' => $category['slug'],
                'image' => 'product.jpg',
                'parent_id' => $parent_id,
                'status' => $category['status']
            ]
        );

        */

        $category = new Category();

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->image = 'noimage.jpg';
        if($category->parent_id){
            $category->parent_id = $request->parent_id;
        }
        $category->status = $request->status;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
