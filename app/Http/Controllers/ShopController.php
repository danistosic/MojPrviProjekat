<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;   // naš model za tablicu "products"
use Illuminate\Http\Request;    // request objekt za formu

class ShopController extends Controller
{
    // Prikaz shop stranice
    public function index()
    {
        // Uzima sve proizvode iz baze
        $products = ProductsModel::all();

        // Šalje u view shop.blade.php
        return view('shop', compact('products'));
    }

    // 2) PRIKAZ FORME ZA DODAVANJE PROIZVODA (GET) URL: /admin/add-product
    public function showAddProductForm()
    {
        // Učitava Blade view addProduct.blade.php
        return view('addProduct');
    }

    // 3) SPREMANJE PROIZVODA U BAZU (POST) URL: /admin/add-product
    public function storeProduct(Request $request)
    {
        // VALIDACIJA
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:products', // "name" mora biti jedinstven u tablici products
            'description' => 'required|string|min:5|max:500',
            'amount'      => 'required|integer|min:1|max:9999',
            'price'       => 'required|numeric|min:0.1|max:99999',
            'image'       => 'required|string|max:255',
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
    // Fetch all products from the database
    $allProducts = ProductsModel::all();

    // Return the view and send $allProducts to Blade
    return view('allProducts', compact('allProducts'));
    }


  
}





