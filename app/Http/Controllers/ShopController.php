<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use App\Http\Requests\ShopProductRequest;

class ShopController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    // Prikaz shop stranice
    public function index()
    {
        // Dohvati sve proizvode iz Repository-ja
        $products = $this->productRepo->getAllProducts();

        // Pošalji ih u shop.blade.php
        return view('shop', compact('products'));
    }

    // Prikaz forme za dodavanje proizvoda
    public function showAddProductForm()
    {
        return view('addProduct');
    }

    // Spremanje proizvoda u bazu (POST)
    public function storeProduct(ShopProductRequest $request)
    {
        // Repository kreira novi proizvod
        $this->productRepo->createNew($request);

        // Redirect s porukom o uspjehu
        return redirect()
            ->route('products.all')
            ->with('success', 'Product created successfully!');
    }

    // Lista svih proizvoda (admin)
    public function showAllProducts()
    {
        $allProducts = $this->productRepo->getAllProducts();

        return view('allProducts', compact('allProducts'));
    }
}
