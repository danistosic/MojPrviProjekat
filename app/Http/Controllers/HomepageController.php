<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Support\Carbon;

class HomepageController extends Controller
{
    public function index()
    {
    
        // 1) Napravi varijablu $sat (trenutni sat)
        $sat = now()->format('H'); 

        // 2) Trenutno vrijeme
        $trenutnoVrijeme = now()->format('H:i:s');

        // 3) Izvuci zadnjih 6 proizvoda
        $products = ProductsModel::orderByDesc('id')
            ->take(6)
            ->get();

        return view('welcome', compact('trenutnoVrijeme', 'sat', 'products'));
    }


}







