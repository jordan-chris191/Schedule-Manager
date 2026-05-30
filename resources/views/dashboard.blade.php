<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-950 text-white min-h-screen">

<!-- Navbar -->
<div class="flex justify-between items-center px-6 py-4 border-b border-zinc-800 bg-zinc-900">
    <h1 class="text-xl font-semibold">Dashboard</h1>

    <form method="POST" action="/logout">
        @csrf
        <button class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded-lg text-sm">
            Logout
        </button>
    </form>
</div>

<!-- Content -->
<div class="p-6">

    <div class="bg-zinc-900 border border-zinc-800 p-6 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold mb-2">
            Welcome, {{ auth()->user()->name }}
        </h2>
        <p class="text-zinc-400">
            {{ auth()->user()->email }}
        </p>
    </div>

    <!-- Simple Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

        <div class="bg-zinc-900 border border-zinc-800 p-4 rounded-xl">
            <h3 class="font-semibold">Total Users</h3>
            <p class="text-zinc-400 text-sm">Demo card</p>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 p-4 rounded-xl">
            <h3 class="font-semibold">Schedules</h3>
            <p class="text-zinc-400 text-sm">Coming soon</p>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 p-4 rounded-xl">
            <h3 class="font-semibold">Tasks</h3>
            <p class="text-zinc-400 text-sm">Testing layout</p>
        </div>

    </div>

</div>

</body>
</html>