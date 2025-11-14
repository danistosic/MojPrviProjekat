<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;   // naš model za tablicu "products"
use Illuminate\Http\Request;    // request objekt za formu

class ShopController extends Controller
{
    // -------------------------------------------------------
    // 1) PRIKAZ SHOP STRANICE
    // -------------------------------------------------------
    public function index()
    {
        // Uzima sve proizvode iz baze
        $products = ProductsModel::all();

        // Šalje u view shop.blade.php
        return view('shop', compact('products'));
    }


    // -------------------------------------------------------
    // 2) PRIKAZ FORME ZA DODAVANJE PROIZVODA (GET)
    // URL: /admin/add-product
    // -------------------------------------------------------
    public function showAddProductForm()
    {
        // Učitava Blade view addProduct.blade.php
        return view('addProduct');
    }


    // -------------------------------------------------------
    // 3) SPREMANJE PROIZVODA U BAZU (POST)
    // URL: /admin/add-product
    // -------------------------------------------------------
    public function storeProduct(Request $request)
    {
        // VALIDACIJA
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string|min:5',
            'amount'      => 'required|integer',
            'price'       => 'required|numeric',
            'image'       => 'required|string'
        ]);

        // SPREMANJE U BAZU
        ProductsModel::create([
            'name'        => $request->get('name'),
            'description' => $request->get('description'),
            'amount'      => $request->get('amount'),
            'price'       => $request->get('price'),
            'image'       => $request->get('image')
        ]);

        // Nakon spremanja — preusmjeri na listu svih proizvoda
        return redirect('/admin/products');
    }

    public function showAllProducts()
    {
    // 1) Uzmi sve proizvode iz baze
    $products = ProductsModel::all();

    // 2) Vrati na view i pošalji proizvode
    return view('allProducts', compact('products'));
    }


    // -------------------------------------------------------
    // 4) PRIKAZ SVIH PROIZVODA U HTML TABLICI
    // URL: /admin/products
    // -------------------------------------------------------
  
}





