<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(Request $request)
    {
       
        $recommend_products = Product::where('recommend_flag', true)->take(3)->get();

        if ($request->category !== null) {
            $products = Product::where('category_id', $request->category)->sortable()->paginate();
            $total_count = Product::where('category_id', $request->category)->count();
            $category = Category::find($request->category);
        } else {
            $products = Product::sortable()->paginate();
            $total_count = "";
            $category = null;
        }
        $categories =Category::all();
        
        return view('products.index', compact('products','category','categories','total_count','recommend_products' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
  
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
         $product->name = $request->input('name');
         $product->category_id = $request->input('category_id');
         $product->save();
 
         return to_route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $comments = $product->comments()->get();
  
         return view('products.show', compact('product', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
  
         return view('products.edit', compact('product', 'categories'));
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
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->update();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return to_route('products.index');
    }
    public function favorite(Product $product)
    {
        Auth::user()->togglefavorite($product);

        return back();
    }

    
}
