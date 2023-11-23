<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $items = \Cart::getContent();
        return view('site.cart', compact('items'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $request->image,
            ],
        ]);

        return redirect()->route('site.cart')->with('success', 'Item adicionado ao carrinho');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('site.cart')->with('success', 'Item removido do carrinho com sucesso');
    }
}
