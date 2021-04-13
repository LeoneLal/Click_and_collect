<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(['picture_slug' => 'required|mimes:png,jpg,svg|max:2048']);
        
        $product = new Product;
        $product->name = $request->name;
        $product->picture_slug = $request->picture_slug;

        // $path = $request->picture_slug->storeAs('img', 'filename.jpg', 'products_img');
        
        // if(!Storage::disk('products_img')->put($path, $file_content)) {
        //     return false;
        // }

        // Don't forget to add 'url' => url('uploads'), too, otherwise 
        // Storage::disk('public_uploads')->url('filename')
        // will return /storage/filename instead of a fully qualified URL.

        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->with('category')->first();
        return view('products.edit')
        ->with('product', $product)
        ->with('categories', $categories);
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
        $product = Product::where('id', $id)->first();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        $product->category_id = $request->get('category_id');
        $product->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect('/products');
    }
}
