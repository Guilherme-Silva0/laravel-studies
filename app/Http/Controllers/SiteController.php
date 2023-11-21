<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        // return "Products";
        // return dd($products);

        $products = Product::paginate(10);

        return view('site.home', compact('products'));
    }
}
