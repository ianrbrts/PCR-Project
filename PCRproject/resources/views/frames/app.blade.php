<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>Taskify</title>
</head>
<body class="bg-gray-100 flex-row">
    <!-- nav bar at the top -->
    <div class=" block bg-white p-10 w-screen flex justify-between shadow-md">
        <p class="text-2xl uppercase font-semibold tracking-widest text-blue-500 uppercase">Taskify</p>

        <nav class="mx-auto flex justify-around">
            <ul class="flex items-center">
                <li class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2"><a href="/">Tasks</a></li>
                @auth
                    <li id="addTask" class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2 cursor-pointer">Add a task</li>
                @endauth
            </ul>

            <ul class="flex items-center">
                @auth
                    <li class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2">{{ Auth::user()->name }}</li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="hover:bg-blue-400 hover:text-white rounded-3xl px-5 py-2">Logout</button>
                        </form>
                        
                    </li>
                @endauth

            </ul>
        </nav>
    </div>

    <!-- form for filling out task info -->
    <div class="rounded-lg bg-white p-10 mt-10 lg:mx-96 md:mx-40 md:min-h-full shadow-md hover:shadow-xl transition duration-400 ease-in-out">
        <div id="modalBox" class="text-center mx-auto hidden">
            <form action="{{ route('savetask') }}" method="post">
                @csrf
                <div class="shadow-md p-5 rounded-lg lg:w-72 mx-auto">
                    <div class="col-span-4">
                        <label for="description" class="block text-sm text-left font-medium text-gray-700">Task description</label>
                        <input type="text" name="description" id="description" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
    
                    @error('description')
                        <div class="text-red-500 text-sm">
                            {{$message}}
                        </div>
                    @enderror
    
    
                    <div class="col-span-4">
                        <label for="priority" class="block text-sm pt-3 text-left font-medium text-gray-700">Select priority</label>
                        <select name="priority" id="priority" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="border-4 rounded-lg">
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                                <option>Critical</option>
                            </div>
                        </select>
                    </div>

                    <div class="col-span-4">
                        <label for="datepicker" class="block text-left text-sm pt-3 font-medium text-gray-700">Due date</label>
                        <input type="datetime-local" id="datepicker" name="date" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    @error('date')
                        <div class="text-red-500 text-sm">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="col-span-4">
                        <label for="status" class="block text-left text-sm pt-3 font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="border-4 rounded-lg">
                                <option>Pending</option>
                                <option>In progress</option>
                                <option>Complete</option>
                            </div>
                        </select>
                    </div>

                    <div class="col-span-4">
                        <label for="assignedto" class="block text-left text-sm pt-3 font-medium text-gray-700">Assigned to:</label>
                        <input name="assignedto" id="assignedto" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </input>
                    </div>

                    <div class="pt-4 text-left">
                        <button type="submit" id="submit" class="py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- content will be the tasks listed in the table -->
        @yield('content')
      
        
    </div>
    
</body>

    <script>
        $(document).ready(function(){
            $("#addTask").click(function() {
                $("#modalBox").slideToggle();
        });
        });

    </script>
</html>