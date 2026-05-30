<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-950 flex items-center justify-center min-h-screen text-white">

<div class="w-full max-w-md bg-zinc-900 border border-zinc-800 p-8 rounded-2xl shadow-xl">

    <!-- Header -->
    <h2 class="text-3xl font-semibold text-center mb-2">Login</h2>
    <p class="text-center text-zinc-400 text-sm mb-6">
        Welcome back, please login to continue
    </p>

    @if ($errors->any())
    <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500 text-red-400 text-sm">
        {{ $errors->first() }}
    </div>
@endif

    <form method="POST" action="/login" class="space-y-4">
        @csrf

        <!-- EMAIL -->
        <div>
            <label class="block text-sm text-zinc-300 mb-1">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-emerald-500 text-white"
            >
        </div>

        <!-- PASSWORD -->
        <div class="relative">
            <label class="block text-sm text-zinc-300 mb-1">Password</label>

            <input
                id="password"
                type="password"
                name="password"
                required
                class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-emerald-500 text-white"
            >

            <!-- TOGGLE -->
            <button
                type="button"
                onclick="togglePassword('password', this)"
                class="absolute right-3 top-9 text-zinc-400 hover:text-white"
            >
                <svg class="eye-open w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5
                          c4.477 0 8.268 2.943 9.542 7
                          -1.274 4.057-5.065 7-9.542 7
                          -4.477 0-8.268-2.943-9.542-7z" />
                </svg>

                <svg class="eye-closed w-5 h-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3l18 18" />
                </svg>
            </button>
        </div>

        <!-- BUTTON -->
        <button
            type="submit"
            class="w-full bg-emerald-600 hover:bg-emerald-500 text-white py-2 rounded-lg
                   transition font-medium shadow-md shadow-emerald-900/30"
        >
            Login
        </button>
    </form>

    <!-- Footer -->
    <p class="text-xs text-center text-zinc-400 mt-5">
        Don't have an account?
        <a href="/register" class="text-emerald-400 hover:underline">Register</a>
    </p>

</div>

</body>
</html>