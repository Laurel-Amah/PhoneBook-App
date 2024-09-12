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
            'phone' => 'required|string|max:12',
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

        return redirect()->route('index')->with('success', 'Contact created successfully!');
    }

    public function index()
    {
        // To retrieve all contacts from the database
        $contacts = Contact::all();

        // To pass the contacts data to the index view
        return view('index', compact('contacts'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id); // Fetch the contact by ID
        return view('edit', compact('contact')); // Pass the contact to the edit view
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'fname' => 'required|string|max:155',
            'lname' => 'nullable|string|max:155',
            'phone' => 'required|string|max:12',
            'email' => 'nullable|email|max:255',
            'category' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048', // Ensure max file size is defined
        ]);
    
        // Find the contact by ID
        $contact = Contact::findOrFail($id);
    
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            
            // Save the new image path to the contact if applicable
            $contact->image_path = 'uploads/' . $imageName; // Assuming 'image_path' is the column name
        }
    
        // Update other contact details with validated data
        $contact->fname = $request->input('fname');
        $contact->lname = $request->input('lname');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->category = $request->input('category');
    
        // Save the updated contact details
        $contact->save();
    
        // Redirect to the contacts index page with a success message
        return redirect()->route('index')->with('success', 'Contact updated successfully!');
    }
}    