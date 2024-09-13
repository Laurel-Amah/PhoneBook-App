<!-- resources/views/contacts/search.blade.php -->
@extends('layouts.sidebar')

@section('title', 'Index')

@section('content')
    <h2>Search Results for "{{ $query }}"</h2>

    @if ($contacts->isEmpty())
        <p>No results found</p>
    @else
        <ul>
            @foreach ($contacts as $contact)
                <li>
                    <a class="result" href="{{ route('contacts.view', $contact->id) }}">
                        {{ $contact->fname }} {{ $contact->lname }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
