<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{

    public function index()
    {

        $cart = Session::get('product', []);

        $allProducts = [];

        foreach ($cart as $cartItem) {
            $allProducts[] = $cartItem['product_id'];
        }

        $products = ProductsModel::whereIn('id', $allProducts)->get()->keyBy('id');

        return view('cart', [
            'cart' => $cart,
            'products' => $products,
        ]);
    }


    public function addToCart(CartAddRequest $request)
    {

        $product = ProductsModel::find($request->id);

        if ($product->amount < $request->amount) {
            return redirect()->back();
        }

        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount
        ]);

        return redirect()->route('cart.index');
    }
}
