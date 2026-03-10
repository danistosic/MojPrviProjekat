<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{

    public function index()
    {
        $cart = Session::get('product', []);

        // Provjera da li je korpa prazna
        if (empty($cart)) {
            return view('cart', [
                'combinedItems' => []
            ]);
        }

        $productIds = array_column($cart, 'product_id');

        $products = ProductsModel::whereIn('id', $productIds)
            ->get()
            ->keyBy('id');

        $combined = [];

        foreach ($cart as $item) {

            if (isset($products[$item['product_id']])) {

                $product = $products[$item['product_id']];

                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'total' => $item['amount'] * $product->price
                ];
            }
        }

        return view('cart', [
            'combinedItems' => $combined
        ]);
    }



    public function finishOrder()
    {
        $cart = Session::get('product', []);

        // provjeri da li je korpa prazna
        if (empty($cart)) {
            return redirect('/');
        }

        $totalCartPrice = 0;

        // izračun total price
        foreach ($cart as $item) {

            $product = ProductsModel::firstWhere([
                'id' => $item['product_id']
            ]);

            // provjera stocka
            if ($item['amount'] > $product->amount) {
                return redirect()->back();
            }

            $totalCartPrice += $item['amount'] * $product->price;
        }

        // kreiranje ordera
        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice
        ]);

        foreach ($cart as $item) {

            $product = ProductsModel::firstWhere([
                'id' => $item['product_id']
            ]);


            // smanji stock
            $product->amount -= $item['amount'];
            $product->save();

            // kreiraj order item
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price
            ]);
        }

        // isprazni korpu
        Session::remove('product');

        // vrati korisnika na cart sa porukom
        return redirect()->route('cart.index')->with('success', 'Order created successfully');
    }



    public function addToCart(CartAddRequest $request)
    {
        $product = ProductsModel::find($request->id);

        if ($product && $product->amount < $request->amount) {
            return redirect()->back();
        }

        $cart = Session::get('product', []);

        $found = false;

        foreach ($cart as $key => $item) {

            if ($item['product_id'] == $request->id) {

                $cart[$key]['amount'] += $request->amount;
                $found = true;
            }
        }

        if (!$found) {

            $cart[] = [
                'product_id' => $request->id,
                'amount' => $request->amount
            ];
        }

        Session::put('product', $cart);

        return redirect('/shop')->with('success', 'Product added to cart');
    }
    

    public function remove($index)
    {
        $cart = Session::get('product', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
        }

        Session::put('product', array_values($cart));

        return redirect()->route('cart.index');
    }
}
