<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function details($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('site.details', compact('product'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->paginate(10);
        return view('site.category', compact('products', 'category'));
    }
}
