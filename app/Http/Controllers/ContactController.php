<?php

namespace App\Http\Controllers;

use App\Models\Contact; 
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

    public function sendContact(Request $request)
    {
    $request->validate([
        // "name" => "pravila"
        "email" => "required|string", // if(isset($_POST['email']) && is_string($_POST['email']),
        "subject" => "required|string",
        "description" => "required|string|min:5", // Description mora biti barem 5 slova
    ]);

    // $sql->query("INSERT INTO contact (email, subject, message) VALUES ('$email', '$subject', '$description')");

    Contact::create([
        "email" => $request->get(key: "email"),
        "subject" => $request->get(key: "subject"),
        "message" => $request->get(key: "description")
    ]);

    return redirect(to: "/shop");
    }

   


}


