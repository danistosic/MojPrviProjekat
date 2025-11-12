<?php

namespace App\Http\Controllers;

use App\Models\Contact; // DODAJ OVO
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function allContacts()
    {
        $allContacts = Contact::all(); // umjesto ContactModel::all()
        return view('allContacts', compact('allContacts'));


        
    }
}


