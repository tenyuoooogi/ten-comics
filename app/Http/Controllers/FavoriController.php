<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       
        if ($request->category !== null) {
            $products = Product::where('category_id', $request->category);
            $total_count = Product::where('category_id', $request->category)->count();
            $category = Category::find($request->category);
        } else {
            $products = Product::all();
            $total_count = "";
            $category = null;
        }
        $categories = Category::select('name')->get();
       
        return view('products.index', compact('products','category','categories','total_count' ));
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

    public function show(Product $product)
    {
        $comments = $product->comments()->get();
  
         return view('products.show', compact('product', 'comments'));
    }
}
