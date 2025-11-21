<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        // Dohvati sve proizvode iz baze
        $allProducts = ProductsModel::all();

        // Pošalji ih u view allProducts.blade.php
        return view('allProducts', compact('allProducts'));
    }

    public function delete($product)
    {
        // 1) Pokušaj pronaći proizvod s ovim ID-om
        // Ovo je ekvivalent: SELECT * FROM products WHERE id = $product LIMIT 1
        $singleProduct = ProductsModel::where('id', $product)->first();

        // 2) Ako proizvod NE POSTOJI → prekini i javi grešku
        if ($singleProduct === null)
        {
            die("Ovaj proizvod ne postoji!");
        }

        // 3) Ako postoji → obriši ga iz baze
        $singleProduct->delete();

        // 4) Nakon brisanja vrati korisnika na listu svih proizvoda
        return redirect('/admin/all-products');
    }
}



