<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Taskify</title>
</head>
<body class="bg-gray-100 flex-row">
    <div class=" block bg-white rounded-xl p-10 w-screen flex justify-between">
        <p class="text-2xl uppercase font-semibold tracking-widest text-blue-500 uppercase">Taskify</p>

        <nav class="mx-auto flex justify-around">
            <ul class="flex items-center">
                <li class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2"><a href="/">Tasks</a></li>
                <li class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2"><a href="/">Add a task</a></li>
            </ul>

            <ul class="flex items-center">
                <li class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2">Ian</li>
                <li><a class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2" href="/">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="rounded-lg bg-white p-10 mt-10 lg:mx-96 md:mx-40 md:min-h-full shadow-md hover:shadow-xl transition duration-400 ease-in-out">

        @yield('auth')
        <p class="text-left text-2xl bold">Shared Tasks</p>

        <table class="table-fixed border-collapse bg-white border-4 border-opacity-10 hover:border-opacity-25 rounded-lg mx-auto mt-10 shadow-md">
            <thead class="justify-between">
                <tr class="">
                    <th class="w-1/4 pb-5">Task Description</th>
                    <th class="w-1/8 pb-5">Date Posted</th>
                    <th class="w-1/8 pb-5">Priority</th>
                    <th class="w-1/8 pb-5">Author</th>
                    <th class="w-1/8 pb-5">Due</th>
                    <th class="w-1/8 pb-5">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 text-center pb-5 ">Complete this php project and email it to rob</td>
                    <td class="px-4 text-center pb-5 ">1/18/21</td>
                    <td class="px-4 text-center pb-5 ">High</td>
                    <td class="px-4 text-center pb-5 ">Ian</td>
                    <td class="px-4 text-center pb-5 ">1/22/21</td>
                    <td class="px-4 text-center pb-5 ">In progress</td>
                </tr>
                <tr>
                    <td class="px-4 text-center pb-5 ">Complete this php project and email it to rob</td>
                    <td class="px-4 text-center pb-5 ">1/18/21</td>
                    <td class="px-4 text-center pb-5 ">High</td>
                    <td class="px-4 text-center pb-5 ">Ian</td>
                    <td class="px-4 text-center pb-5 ">1/22/21</td>
                    <td class="px-4 text-center pb-5 ">In progress</td>
                </tr>
                
            </tbody>
        </table>
    </div>
    
</body>
</html>