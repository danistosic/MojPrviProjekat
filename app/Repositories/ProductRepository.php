<?php

namespace App\Repositories;


use App\Models\ProductsModel;

class ProductRepository
{
    // Dohvati sve proizvode
    public function getAllProducts()
    {
        return ProductsModel::all();
    }

    // Dohvati jedan proizvod po ID-u
    public function getProductById($id)
    {
        return ProductsModel::find($id);
    }

    // Kreiranje novog proizvoda
    public function createNew($request)
    {
        return ProductsModel::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'amount'      => $request->amount,
            'image'       => $request->image,
        ]);
    }

    // Uređivanje postojećeg proizvoda
    public function editProduct($product, $request)
    {
        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'amount'      => $request->amount,
        ]);
    }
}
