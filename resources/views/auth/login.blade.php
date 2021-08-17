<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')

    <title>@yield('title') | e-Office</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">

    @stack('before-style')
    <!-- style -->
    @include('includes.style')
    @stack('after-style')

</head>

<body>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- </div> -->
        <!-- ./wrapper -->

        @include('home.sidebar')
        <x-guest-layout>
            <x-jet-authentication-card>
                <x-slot name="logo">
                    <!-- <a href="#"><img height="100px" width="100px"
            src="{{ asset("/img/logo_big.png")}}"></a> -->

                </x-slot>

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>

                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email"
                            :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Kata sandi" required
                            autocomplete="current-password" />
                    </div>
                    <div class="mt-4">

                        <label for="show" class="flex items-center">
                            <x-jet-checkbox id="show" name="show" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Lihat kata sandi') }}</span>
                        </label>
                    </div>
                    <!-- <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> -->

                    <div class="flex items-center justify-end mt-4">
                        <!-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif -->
                        <button class="btn btn-default btn-sm " onclick="return confirm('Silakan hubungi admin')">
                            Lupa Kata Sandi?</button>
                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>
            </x-jet-authentication-card>
        </x-guest-layout>

        @include('includes.footer')

        @stack('before-script')
        <!-- script -->
        @include('includes.script')
        @stack('after-script')

</body>

</html>