<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/232f67a211.js" crossorigin="anonymous"></script>

    <!-- Link to the stylesheet for the nav bar -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Link to the stylesheet for the index page -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <!-- Link to the stylesheet for the create page -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <!-- Link to the stylesheet for the view page -->
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">

    <!-- Link to the stylesheet for the btns-->
    <link rel="stylesheet" href="{{ asset('css/btn.css') }}">

    <!-- Include intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    <div class="container">
        <nav class="side-nav">
            <div class="nav-top">
                <i class="fas fa-user-circle"></i>
                <span style="font-weight: bold;">My Phonebook</span>
            </div>
            <div class="nav-mid">
                <a href="{{ route('contacts.create') }}" class="create-contact"><i class="fas fa-plus-square"></i> 
                    <span class="btn-text">Create new <span class="font-bold">Contact</span></span>
                </a>
                <br><br>
                <a href="{{ route('index') }}" class="contacts"><i class="fas fa-user"></i><span>Contacts</span></a>
            </div>
        </nav>
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
