@extends('layouts.sidebar')

@section('title', 'Create')

@section('content')
    <div class="title">
        <h2>Create Contact</h2>
    </div>
    
    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="head">
            <i class="fas fa-arrow-left" title="Back"></i>
            <button type="submit" class="save-btn">
                <span>Save contact</span>
                <i class="fa-solid fa-file-arrow-down"></i>
            </button>
        </div>
        <div class="image-icon">
            <i class="fa-regular fa-circle-user"></i>
            <button class="add-user" title="hello!">
                <i class="fa-solid fa-circle-plus"><input type="file" name="image" id="image"/>
            </i>
            </button>
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

            <div class="field">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" name="phone" id="phone" required/>
                <span id="phoneError" class="error"></span><br><br>
            </div>

            <div class="field">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" id="email"/>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </div>
@endsection