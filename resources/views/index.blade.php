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
            <p>Contacts</p>
            @foreach ($contacts as $contact)
            <tr>
                <td class="name">
                    <img src="{{ $contact->image }}" alt="contact Image">
                    <span>{{ $contact->fname }} </span>
                    <span>{{ $contact->lname }}</span>
                </td>
                <td>
                    {{ $contact->phone }}
                </td>
                <td>
                    {{ $contact->email }}
                </td>
                <td> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection