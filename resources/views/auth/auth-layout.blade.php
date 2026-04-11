<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('back_auth/assets/img/favicon.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_auth/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/style.css') }}">
</head>

<body class="bg-white dark:bg-slate-950 transition-colors duration-300">
    <div class="main-wrapper login-body dark:bg-slate-950">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox bg-white dark:bg-slate-900 shadow-2xl border dark:border-slate-800 rounded-2xl overflow-hidden">
                    
                    <div class="login-left dark:bg-slate-800 flex items-center justify-center"> 
                        <img class="img-fluid w-32" src="{{ asset('back_auth/assets/img/logo.png') }}" alt="Logo"> 
                    </div>

                    <div class="login-right dark:bg-slate-900 p-8">
                        <div class="login-right-wrap">
                            {{-- Le contenu injecté via @yield('auth-form') devra aussi utiliser des classes dark: pour les inputs --}}
                            @yield('auth-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('back_auth/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('back_auth/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_auth/assets/js/script.js') }}"></script>
</body>
</html>