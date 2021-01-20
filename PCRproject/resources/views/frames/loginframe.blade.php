<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Taskify Login</title>
</head>
<body class="bg-gray-100 flex-row">
    <div class=" block bg-white rounded-xl p-10 w-screen flex justify-between">
        <p class="text-2xl uppercase font-semibold tracking-widest text-blue-500 uppercase">Taskify</p>

        <a href="{{ route('register') }}" class="text-lg hover:underline">Register a new account</a>

    </div>

    <div class="rounded-lg bg-white p-10 mt-10 lg:mx-96 md:mx-40 md:min-h-full shadow-md hover:shadow-xl transition duration-400 ease-in-out">
        @yield('login')
    </div>
    
</body>
</html>