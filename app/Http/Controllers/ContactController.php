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
            'phone' => 'required|string|max:15',
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

    public function index(Request $request)
    {
        // To retrieve all contacts from the database
        $contacts = Contact::all();
        // Get the sort option from the request, default to 'asc' (A-Z)
        $sort = $request->input('sort', 'asc');

        // Define the sorting logic
        switch ($sort) {
            case 'desc':
                $contacts = Contact::orderBy('fname', 'desc')->get();
                break;
            case 'recent':
                $contacts = Contact::orderBy('created_at', 'desc')->get();
                break;
            default:
                $contacts = Contact::orderBy('fname', 'asc')->get();
        }

        return view('index', compact('contacts', 'sort'));
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
            'phone' => 'required|string|max:15',
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

    public function view($id)
    {
        $contact = Contact::findOrFail($id);
        return view('view', compact('contact'));
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('index')->with('success', 'Contact deleted successfully!');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'nullable|string|max:255',
        ]);

        $query = $request->input('query');

        // Perform the search
        $contacts = Contact::where('fname', 'like', "%{$query}%")
                            ->orWhere('lname', 'like', "%{$query}%")
                            ->orWhere('phone', 'like', "%{$query}%")
                            ->orWhere('email', 'like', "%{$query}%")
                            ->get();

        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json(['contacts' => $contacts]);
        }

        // Return the normal view with all contacts if not an AJAX request
        return view('index', compact('contacts'));
    }
}