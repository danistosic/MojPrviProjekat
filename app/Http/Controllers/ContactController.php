<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 1) Otvaranje contact stranice (form)
    public function index()
    {
        return view('contact');
    }

    // 2) Prikaz svih kontakata (admin/all-contacts)
    public function allContacts()
    {
        $allContacts = Contact::all();

        return view('allContacts', compact('allContacts'));
    }

    // 3) Slanje kontakt poruke + validacija + spremanje u bazu
    public function sendContact(Request $request)
    {
        // PROBA: vidi da li forma uopće dolazi ovdje
        // (možeš ovo ostaviti za jedan test)
        // dd($request->all());

        // Validacija inputa
        $validated = $request->validate([
            'email'       => 'required|email|max:255|unique:contact,email',
            'subject'     => 'required|string|min:3|max:100',
            'description' => 'required|string|min:5|max:500',
        ]);

        // Spremanje u bazu
        Contact::create([
            'email'   => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['description'], // kolona "message" u bazi
        ]);

        // Nakon slanja vrati korisnika na shop + flash poruka
        return redirect()
            ->route('shop')
            ->with('success', 'Poruka je uspješno poslana!');
    }
}




