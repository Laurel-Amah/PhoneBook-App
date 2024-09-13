@extends('layouts.sidebar')

@section('title', 'View')

@section('content')
    <div class="theme">
        <h2>Contact Info</h2>
    </div>
    <div class="header1">
        <a href="{{ route('index') }}"><i class="fas fa-arrow-left" title="Back"></i></a>

        <div class="buttons1">
            <a href="{{ route('contacts.edit', $contact->id) }}" class="edit-btn">
               Edit Contact <i class="fas fa-edit"></i>
            </a>
            <a href="{{ route('contacts.delete', $contact->id) }}" class="del-btn" id="delete" onclick="return confirm('Are you sure you want to delete this contact?');"> <i class="fas fa-trash"></i></a>
        </div>
    </div>
    <div class="image-icon1">
        <input type="file" name="image" id="file-upload" accept="image/*" onchange="previewImage(event)"/>
        <label for="file-upload" class="upload-button"><i class="fas fa-edit"></i></label>
        <div class="avatar-frame">
            <img id="avatar" src="{{ $contact->image_path ? asset($contact->image_path) : asset('images/user2.png') }}" alt="Avatar">
        </div>
    </div>
    <span class="names1"> {{ old('name', $contact->fname) }} {{ old('name', $contact->lname) }}</span>
   <div class="division"></div>
    <div class="details">
        <h4>Contact details</h4>
        <span><i class="fa-solid fa-phone"></i> {{ old('name', $contact->phone) }}</span><br><br>
        <span><i class="fa-regular fa-envelope"></i>{{ old('name', $contact->email) }} </span><br><br>
        <span><i class="fas fa-th-large"></i>{{ old('name', $contact->category) }}</span><br><br>
    </div>
@endsection
