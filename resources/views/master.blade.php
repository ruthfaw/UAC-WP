<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>@yield('title')</title> 
    <style>
        .card-img-top{
            width: 260px;
            height: 260px;
            object-fit: cover;
        }
        body{
            background-color: #EAE3D2;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: #141a47;
        }
        .btn{
            background-color: #1C3879;
            color: white;
        }
        #navyRadio {
	        accent-color: #141a47;
        }
    </style>
</head>
<body>
    <header>
        <div class="nav justify-content-between d-flex gap-4 p-2 w-100" style="background-color: #607EAA;">
            <a class="title nav-item navbar-brand" href="/home/en" style="text-decoration: none;color: white;">
                <img class="logo" src="/logo/Logo.png" height="100px" width="325px">
            </a>
            <div class="d-flex nav-item gap-3">
                <div class="avatar px-2 dropdown align-self-center">
                    <a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="font-size:25px;text-decoration:none;color:#141a47;">
                        <img class="detail-img" src="/iconDetails/connection.png" alt="slide" width="50px" height="55px">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/wishlist"> @lang('navbar.dropdown.wishlist')</a></li>
                        <li><a class="dropdown-item" href="/friend-request">@lang('navbar.dropdown.fr')</a></li>
                    </ul>
                </div>
                <div class="avatar px-2 dropdown align-self-center">
                    <a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="font-size:25px;text-decoration:none;color:#141a47;">
                        <img class="detail-img" src="/iconDetails/avatar.png" alt="slide" width="50px" height="55px">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/avatar">@lang('navbar.dropdown.ac')</a></li>
                        <li><a class="dropdown-item" href="/view-purchased-avatar">@lang('navbar.dropdown.pa')</a></li>
                    </ul>
                </div>
                <div class="coins px-2 align-self-center">
                    <a href="/topUp" style="font-size:25px;text-decoration:none;color:#141a47;">
                        <img class="detail-img" src="/iconDetails/coins.png" alt="slide" width="38px" height="42px">
                    </a>
                </div>
                <div class="avatar px-2 dropdown align-self-center">
                    <a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="font-size:25px;text-decoration:none;color:#141a47;">
                        <img class="detail-img" src="/iconDetails/profile.png" alt="slide" width="38px" height="42px">
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                        <li><a class="dropdown-item" href="/profile/{{auth()->user()->id}}">@lang('navbar.dropdown.profile')</a></li>
                        @endauth
                        @if(is_null(auth()->user()))
                            <li><a class="dropdown-item" href="/login/en">@lang('navbar.dropdown.login')</a></li>
                        @endif
                        <li><a class="dropdown-item" href="/logout">@lang('navbar.dropdown.logout')</a></li>
                        <li><a class="dropdown-item" href="/visibility-setting">@lang('navbar.dropdown.vs')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
   {{-- @yield('regPaymentModal') --}}

    {{-- @include('sweetalert:alert') --}}
    @yield('authenticated-form')
    <div class="content">
        @yield('content')
    </div>

    <div class="" style="background-color:#ede6db;">
        <footer class="d-flex justify-content-center align-items-center p-2 border-top" style="background-color: #607EAA;margin-top:50px">
            <div class="d-flex align-items-center gap-2" style="background-color: #background-color:#607EAA;">
            <div style="margin-top: 30px;margin-bottom:30px;color:#141a47;font-size:20px;font-weight:400">
                &copy Beeverse Company
            </div>
        </footer>
    </div>
</body>
</html>