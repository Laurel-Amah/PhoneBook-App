@extends('layouts.sidebar')

@section('title', 'Create')

@section('content')
    <div class="title">
        <h2>Create Contact</h2>
    </div>
    
    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <!--generates a hidden token that helps prevent Cross-Site Request Forgery (CSRF) attacks -->
        <div class="head">
        <a href="{{ route('index') }}"><i class="fas fa-arrow-left" title="Back"></i></a>
            <button type="submit" class="save-btn"  id="create" onclick="showAlert()">
                <span>Save contact</span>
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
                <input type="text" name="fname" id="fname" placeholder="First Name" required/>
                <br><br>
                <input type="text" name="lname" id="lname" placeholder="Last Name"/>
                <br><br>
            </div>

            <div class="phone-input-wrapper">
                <i class="fas fa-phone"></i>
                <div class="flag-dropdown">
                    <!-- This will be managed by intl-tel-input -->
                    <input id="phone-flag" type="tel" name="phone-flag">
                </div>
                <div class="phone-number-input">
                    <!-- Actual phone number input -->
                    <input id="phone-number" name="phone" type="text" placeholder="Phone number">
                </div>
            </div>

            <div class="field">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email"/>
                <br><br>
            </div>

            <div class="field">
                <i class="fas fa-th-large"></i>
                <input type="text" name="category" id="category" placeholder="Category"/>
                <br><br>
            </div>
        </form>
        <script src="{{ asset('js/validate.js') }}"></script> 
        <script src="{{ asset('js/phone-input.js') }}"></script>
        <script src="{{ asset('js/image-preview.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </div>

    
     <!-- Custom Alert HTML -->
     <div id="customAlert" class="alert" style="display: none;">
        <div class="alert-content"> 
            <div class="alert-icon">
             <i class="fa-solid fa-user-times"></i>
            </div> <br><p>The contact is saved successfully!</p>
        <button class="close-btn" onclick="closeAlert()">✖</button> 
        </div>
    </div>

    <!-- Include meta tag for JavaScript -->
    <meta name="alert-message" content="{{ session('success') ? 'true' : 'false' }}">

    <!-- Link to the custom JS file -->
    <script src="{{ asset('js/alerts.js') }}"></script>

@endsection