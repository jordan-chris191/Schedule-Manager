<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white w-full max-w-sm p-8 rounded-2xl shadow-md">

        <h2 class="text-2xl font-bold text-center mb-6">Create Account</h2>

        <form method="POST" action="/register">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Name</label>
                <input 
                    type="text" 
                    name="name"
                    required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input 
                    type="email" 
                    name="email"
                    required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >
            </div>

            <!-- Password -->
            <div class="mb-3 relative">
                <label class="block text-sm font-medium mb-1">Password</label>

                <input 
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >

                <button 
                    type="button"
                    onclick="togglePassword('password')"
                    class="absolute right-3 top-9 text-sm text-gray-500"
                >
                    👁️
                </button>
            </div>

            <!-- Confirm Password -->
            <div class="mb-2 relative">
                <label class="block text-sm font-medium mb-1">Confirm Password</label>

                <input 
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    onkeyup="checkPasswordMatch()"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >

                <button 
                    type="button"
                    onclick="togglePassword('password_confirmation')"
                    class="absolute right-3 top-9 text-sm text-gray-500"
                >
                    👁️
                </button>

                <p id="matchText" class="text-xs mt-2"></p>
            </div>

            <!-- Submit -->
            <button 
                type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition mt-4"
            >
                Register
            </button>
        </form>

        <p class="text-xs text-center text-gray-500 mt-4">
            Already have an account? 
            <a href="/login" class="text-blue-600 hover:underline">Login</a>
        </p>

    </div>

</body>
</html>