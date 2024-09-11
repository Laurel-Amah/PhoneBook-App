<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request) {
        // Validate Form data

        $validated = $request->validate([
            'fname' => 'required|string|max:155',
            'lname' => 'nullable|string|max:155',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'category' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,gif'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time(). '_' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $validated['image_path'] = 'uploads/' . $imageName; // To save the path to the database
        }

        Contact::create($validated);

        return redirect()->route('contacts.create')->with('success', 'Contact created successfully!');
    }
}
