@extends('layouts.sidebar')

@section('title', 'Index')

@section('content')
    <header>
        <h2> Contacts </h2><br>
        <div class="header-actions">
            <input type="search" name="searchbar" placeholder="Search ..." required>
            <select class="sort">
                <option>Sort by: A-Z</option>
                <option>Sort by: Z-A</option>
                <option>Sort by: Recent </option>
            </select>
        </div>
    </header>
    <div class="table">
    <table class="contact-table">
        <thead> 
            <tr>
                <th> Name </th>
                <th> Number </th>
                <th> Email </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <tr> <td colspan="4">Contacts</td></tr>
            @foreach ($contacts as $contact)
            <tr>
                <td>
                    <div class="name">
                        <img src="{{ $contact->image_path ? asset($contact->image_path) : asset('images/user2.png') }}" alt="contact Image" id="contact-image">
                        <span>{{ $contact->fname }} </span>
                        <span>{{ $contact->lname }}</span>
                    </div>
                </td>
                <td>
                    {{ $contact->phone }}
                </td>
                <td>
                    {{ $contact->email }}
                </td>
                <td>
                    <div class="button">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection