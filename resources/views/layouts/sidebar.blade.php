<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/232f67a211.js" crossorigin="anonymous"></script>

     <!-- Include intl-tel-input CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    
     <title>@yield('title', 'Default Title')</title>
<body>
<body>
    <div class="container">
        <nav class="side-nav">
            <div class="nav-top">
                <i class="fas fa-user-circle"></i>
                <span style="font-weight: bold;">My Phonebook</span>
            </div>
            <div class="nav-mid">
                <button href="#" class="create-contact"><i class="fas fa-plus-square"></i> 
                    <span class="btn-text">Create new <span class="font-bold">Contact</span></span>
                </button>
                <br><br>
                <button href="#" class="contacts"><i class="fas fa-user"></i><span>Contacts</span></button>
            </div>
        </nav>
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
