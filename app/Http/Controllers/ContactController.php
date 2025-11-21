<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    // 1) OTVARANJE CONTACT STRANICE (form)
    public function index()
    {
        return view('contact');
    }


    
    // 2) PRIKAZ SVIH KONTAKATA (admin/all-contacts)
    public function allContacts()
    {
        // Dohvati sve zapise iz tablice "contacts"
        $allContacts = Contact::all();

        // Pošalji ih u allContacts.blade.php
        return view('allContacts', compact('allContacts'));
    }


    
    // 3) SLANJE KONTAKT PORUKE + VALIDACIJA + SPREMANJE U BAZU
    public function sendContact(Request $request)
    {
        // Validacija input polja
        $request->validate([
            'email'       => 'required|email|max:255|unique:contacts,email',
            'subject'     => 'required|string|min:3|max:100',
            'description' => 'required|string|min:5|max:500',
        ]);

        // Spremanje u bazu
        Contact::create([
            'email'   => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('description'),
        ]);

        // Nakon slanja vrati korisnika na shop
        return redirect('/shop');
    }


    
    // 4) BRISANJE KONTAKTA PO ID-U
    public function delete($contact)
    {
        // 1) Pronađi jedan kontakt s tim ID-om
        $singleContact = Contact::where('id', $contact)->first();

        // 2) Ako kontakt NE POSTOJI — izbaci poruku i prekini
        if ($singleContact === null) {
            die("OVAJ KONTAKT NE POSTOJI!");
        }

        // 3) Ako postoji — obriši ga iz baze
        $singleContact->delete();

        // 4) Vrati korisnika natrag na listing svih kontakata
        return redirect('/admin/all-contacts');
    }
}



