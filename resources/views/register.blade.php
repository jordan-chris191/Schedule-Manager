<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Schedule Manager') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-950 flex items-center justify-center min-h-screen text-white">

<div class="w-full max-w-md bg-zinc-900 border border-zinc-800 p-8 rounded-2xl shadow-xl">

    <!-- Header -->
    <h2 class="text-3xl font-semibold text-center mb-2">Pre-Registration</h2>
    <p class="text-center text-zinc-400 text-sm mb-6">
        Join and start managing your schedule
    </p>

    <form method="POST" action="/register" class="space-y-4" novalidate id="registerForm" >
        @csrf

        <!-- NAME -->
        <div>
            <label class="block text-sm text-zinc-300 mb-1">Name</label>
            <input
            required
                type="text"
                id="name"
                name="name"
                class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-emerald-500 text-white"
            >
            <p id="nameError" class="text-red-500 text-xs mt-1 hidden">Name is required</p>
        </div>

        <!-- EMAIL -->
        <div>
            <label class="block text-sm text-zinc-300 mb-1">Email</label>
            <input
            required
                type="email"
                id="email"
                name="email"
                class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-emerald-500 text-white"
            >
            <p id="emailError" class="text-red-500 text-xs mt-1 hidden"> Invalid email</p>
        </div>

        <!-- PASSWORD -->
        <div class="relative">
            <label class="block text-sm text-zinc-300 mb-1">Password</label>

            <input
                required
                id="password"
                type="password"
                name="password"
                class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-emerald-500 text-white"
                onkeyup="checkPasswordStrength(); checkPasswordMatch(); checkPasswordRules();"
            >

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

            <p id="passwordError" class="text-red-500 text-xs mt-1 hidden">
                Password is required
            </p>

            <p id="strengthText" class="text-xs mt-1 text-zinc-400"></p>

            <div class="w-full bg-zinc-800 rounded h-1 mt-2">
                <div id="strengthBar" class="h-1 rounded w-0 bg-red-500 transition-all"></div>
            </div>
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="relative">
            <label class="block text-sm text-zinc-300 mb-1">Confirm Password</label>

            <input
                required
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-emerald-500 text-white"
                onkeyup="checkPasswordMatch()"
            >

            <button
                type="button"
                onclick="togglePassword('password_confirmation', this)"
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

            <p id="confirmError" class="text-red-500 text-xs mt-1 hidden">
                Please confirm your password
            </p>

            <p id="matchText" class="text-xs mt-2"></p>
        </div>

        <!-- SUBMIT -->
        <button
            type="submit"
            class="w-full bg-emerald-600 hover:bg-emerald-500 text-white py-2 rounded-lg
                   transition font-medium shadow-md shadow-emerald-900/30"
        >
            Register
        </button>
    </form>

    <p class="text-xs text-center text-zinc-400 mt-5">
        Already have an account?
        <a href="/login" class="text-emerald-400 hover:underline">Login</a>
    </p>

</div>

</body>
</html>