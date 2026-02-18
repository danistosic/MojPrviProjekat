<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;


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
    public function sendContact(ContactRequest $request)
    {
        Contact::create([
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->description,
        ]);

        return redirect()
            ->route('shop')
            ->with('success', 'Poruka je uspješno poslana!');
    }
}




