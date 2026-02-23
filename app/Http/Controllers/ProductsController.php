<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    // Repository instance
    private $productRepo;

    // Dependency Injection
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    // Prikaz svih proizvoda (admin lista)
    public function index()
    {
        $allProducts = $this->productRepo->getAllProducts();

        return view("allProducts", compact('allProducts'));
    }

    public function showAddProductForm()
    {
        return view('products.addProduct');
    }

    // Brisanje proizvoda
    public function delete($product)
    {
        $singleProduct = $this->productRepo->getProductById($product);

        if ($singleProduct === null) {
            die("Ovaj proizvod ne postoji!");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    // Prikaz forme za edit (Route Model Binding)
    public function singleProduct(Request $request, ProductsModel $product)
    {
        return view('products.edit', compact('product'));
    }

    // Spremanje izmijenjenog proizvoda (POST)
    public function edit(UpdateProductRequest $request, ProductsModel $product)
    {
        // Repository update
        $this->productRepo->editProduct($product, $request);

        return redirect('/admin/products/all');
    }

    // Dodavanje novog proizvoda (POST)
    public function saveProduct(SaveProductRequest $request)
    {
        // Repository create
        $this->productRepo->createNew($request);

        return redirect()
            ->route('products.all')
            ->with('success', 'Product created successfully!');
    }
}
