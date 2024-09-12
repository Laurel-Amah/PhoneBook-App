@extends('layouts.sidebar')

@section('title', 'Create')

@section('content')
    <div class="title">
        <h2>Edit Contact</h2>
    </div>
    
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf <!--generates a hidden token that helps prevent Cross-Site Request Forgery (CSRF) attacks -->
        @method('PUT')
        <div class="head">
            <i class="fas fa-arrow-left" title="Back"></i>
            <button type="submit" class="save-btn">
                <span>Update contact</span>
                <i class="fa-solid fa-file-arrow-down"></i>
            </button>
        </div>
        <div class="image-icon">
            <input type="file" name="image" id="file-upload" accept="image/*" onchange="previewImage(event)">
            <label for="file-upload" class="upload-button">+</label>
            <div class="avatar-frame">
            <img id="avatar" src="{{ asset('images/user.png') }}" alt="Avatar">
            </div>
        </div>

    <div class="create-details">
        <p>Details</p>
            <div class="field">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="fname" id="fname" placeholder="First Name" value="{{ old('name', $contact->fname) }}" required/>
                <br><br>
                <input type="text" name="lname" id="lname" placeholder="Last Name" value="{{ old('name', $contact->lname) }}"/>
                <br><br>
            </div>

            <div class="field">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" name="phone" id="phone" placeholder="Phone Number" value="{{ old('phone', $contact->phone) }}" required/>
                <span id="phoneError" class="error"></span><br><br>
            </div>

            <div class="field">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email', $contact->email) }}"/>
                <br><br>
            </div>

            <div class="field">
                <i class="fas fa-th-large"></i>
                <input type="text" name="category" id="category" placeholder="Category" value="{{ old('category', $contact->category) }}"/>
                <br><br>
            </div>
        </form>
        <script src="{{ asset('js/validate.js') }}"></script> 
        <script src="{{ asset('js/phone-input.js') }}"></script>
        <script src="{{ asset('js/image-preview.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </div>
@endsection