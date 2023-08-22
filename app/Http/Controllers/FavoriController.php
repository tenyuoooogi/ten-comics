<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $user = Auth::user();
    
            $favorites = $user->favorites(Product::class)->get();
    
            return view('favoris.index', compact('favorites'));
        
    }
}