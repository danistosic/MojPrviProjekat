<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Prikaz svih proizvoda (lista)
    public function index()
    {
        $allProducts = ProductsModel::all(); // Dohvati sve proizvode iz baze

        return view('allProducts', compact('allProducts')); // Pošalji u view
    }

    // Brisanje proizvoda po ID-u
    public function delete($product)
    {
        $singleProduct = ProductsModel::where('id', $product)->first(); // Pronađi proizvod

        if ($singleProduct === null) {
            dd("Ovaj proizvod ne postoji!"); // Ako ne postoji → prekini
        }

        $singleProduct->delete(); // Ako postoji → obriši ga
        return redirect('/admin/all-products'); // Vrati korisnika na listu
    }

    // Prikazuje formu za uređivanje proizvoda po ID-u
    public function singleProduct(Request $request, $id)
    {
        $product = ProductsModel::where('id', $id)->first(); // Pronađi proizvod u bazi

        if ($product === null) {
            dd("Ovaj proizvod ne postoji!"); // Ako ne postoji → prekini
        }

        return view('products.edit', compact('product')); // Pošalji proizvod u edit view
    }

    // Sprema izmijenjeni proizvod (POST)
    public function edit(Request $request, $id)
    {
    // 1) Pronađi proizvod u bazi
    $product = ProductsModel::where('id', $id)->first();

    if ($product === null) {
        die("Ovaj proizvod ne postoji!");
    }

    // 2) Validacija novih vrijednosti
    $request->validate([
        'name'        => 'required|string|min:3|max:255',
        'description' => 'required|string|min:3|max:500',
        'price'       => 'required|numeric|min:0.1|max:99999',
        'amount'      => 'required|integer|min:1|max:99999',
        // image više *nije obavezan* kod editiranja!
    ]);

    // 3) Upis novih vrijednosti iz forme
    $product->name        = $request->name;
    $product->description = $request->description;
    $product->price       = $request->price;
    $product->amount      = $request->amount;

    // 4) Ako je korisnik unio novu sliku → spremi je
    //    Ako NIJE → ostavi staru sliku u bazi
    if ($request->image) {
        $product->image = $request->image;
    }

    // 5) Spremi promjene u bazu
    $product->save();

    // 6) Redirect s porukom uspjeha
    return redirect('/admin/all-products')
        ->with('success', 'Product updated successfully!');
    }

}
