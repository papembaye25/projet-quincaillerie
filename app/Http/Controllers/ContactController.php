<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name'    => 'required|min:2|max:100',
            'email'   => 'required|email',
            'phone'   => 'nullable|max:20',
            'message' => 'required|min:10',
        ]);

        // Enregistrement en base de données
        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
        ]);

        // Redirection avec message de succès
        return redirect()->route('contact')
                         ->with('success', 'Votre message a été envoyé avec succès !');
    }
}