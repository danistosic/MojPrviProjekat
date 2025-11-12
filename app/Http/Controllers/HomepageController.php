<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    public function index()
    {
        // 1) Napravi varijablu $sat (trenutni sat)
        $sat = now()->format('H'); // 00–23; stavi 'h' za 01–12 ako želiš 12h format

        // 2) Trenutno vrijeme sat:minuta:sekunda
        $trenutnoVrijeme = now()->format('H:i:s'); // promijeni u 'h:i:s' za 12h

        // 3) Proslijedi podatke u Blade
        return view('welcome', compact('trenutnoVrijeme', 'sat'));
    }
}




