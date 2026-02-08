<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $products = product::with('category')
        ->orderBy('id', 'desc')
        ->take(4)
        ->get();
        return view('welcome', compact('products'));
    }
}
