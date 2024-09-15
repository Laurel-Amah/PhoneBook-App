@extends('layouts.sidebar')

@section('title', 'Index')

@section('content')
    <header>
        <h2> Contacts </h2><br>
        <div class="header-actions">
            <form action= "{{ route('contacts.search') }}" method='post' class='search-form'>
                @csrf
            <input type="search" name="query" placeholder="Search ..." required>
            </form>
            <div id="results"></div>
            <form action="{{ route('index') }}" method="GET" class="search-form">
                <select name="sort" onchange="this.form.submit()" class="sort">
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Sort by:A-Z</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Sort by:Z-A</option>
                    <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Sort by:Most Recent</option>
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
                <tr> <td colspan="4" class="names2">Contacts</td></tr>
                @foreach ($contacts as $contact)
                <tr>
                    <td>
                        <div class="name">
                            <img src="{{ $contact->image_path ? asset($contact->image_path) : asset('images/user2.png') }}" alt="contact Image" id="contact-image">
                            <a href="{{ route('contacts.view', $contact->id) }}">
                                <span>{{ $contact->fname }} </span>
                                <span>{{ $contact->lname }}</span>
                            </a>
                        </div>
                    </td>
                    <td>
                        <a href="tel:{{ $contact->phone }}" data-ajax="false">
                            {{ $contact->phone }}
                        </a>
                    </td>
                    <td>    
                        <a href="mailto:{{ $contact->email }}" data-ajax="false">
                            {{ $contact->email }}
                        </a>
                    </td>
                    <td>
                        <div class="button2">
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
    <script src="{{ asset('js/search.js') }}"></script>
@endsection