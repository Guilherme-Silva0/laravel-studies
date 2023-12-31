<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return dd($products);
        $products = Product::paginate(6);
        $productsTotalCount = Product::count();
        $categories = Category::all();
        return view('admin.products', compact('products', 'productsTotalCount', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->all();

        if($request->image) {
            $product['image'] = $request->image->store('products');
        } else {
            $product['image'] = 'products/placeholder-image.jpg';
        }


        $product['slug'] = Str::slug($request->name);

        $product = Product::create($product);
        return redirect()->route('admin.products')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Product id: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Produto removido com sucesso!');
    }
}
