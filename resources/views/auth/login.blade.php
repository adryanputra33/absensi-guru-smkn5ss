<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="login-container">
    <img src="{{ asset('images/logo.png') }}" alt="Logo"> <!-- Ganti dengan path gambar logo Anda -->
    <h2>ABSENSI GURU</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <input id="email" type="email" class="form-control" placeholder="Username" name="email" :value="old('email')" required autofocus autocomplete="username" >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>
        <div class="mb-3">
            <input type="password" class="form-control block mt-1 w-full" id="password" name="password" placeholder="Password" required autocomplete="current-password" >
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif


        </div>
        <button type="submit" class="btn">{{ __('Log in') }}</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
