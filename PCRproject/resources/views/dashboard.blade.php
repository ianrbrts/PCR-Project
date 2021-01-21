@extends('frames.app')

@section('content')
    <div class="text-lg p-5">
        <p class="text-left text-2xl bold mx-auto">Public tasks</p>

        

        <table class="table-fixed flex-row border-collapse bg-white rounded-lg mx-auto mt-10 shadow-xl">
            <thead class="justify-between">
                    <tr class="">
                        <th class="w-1/4 pb-5">Task description</th>
                        <th class="w-1/5 pb-5">Date posted</th>
                        <th class="w-1/8 pb-5">Priority</th>
                        <th class="w-1/8 pb-5">Author</th>
                        <th class="w-1/8 pb-5">Due</th>
                        <th class="w-1/8 pb-5">Status</th>
                        <th class="w-1/6 pb-5 ">Assigned to</th>
                    </tr>
            </thead>

            <!-- checking if there are any posts in the database, then showing a table row for each task -->
            @if ($tasks->count())
                @foreach ($tasks as $task)
                    <tbody>
                        <tr>
                            <td class="px-4 text-center pb-5 ">{{ $task->taskdesc }}</td>
                            <td class="px-4 text-center pb-5 text-sm">{{ $task->created_at }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->priority }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->user->name }}</td>
                            <td class="px-4 text-center pb-5 text-sm">{{ $task->dueDate }}</td>
                            <td class="px-4 text-center pb-5 text-sm">{{ $task->status }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->assignedTo }}</td>
                            <td class="px-4 text-center pb-5 ">
                                <button id= "editbutton{{ $task->id }}" class="text-sm bg-blue-500 rounded-xl px-3 py-2 shadow-md text-white focus:outline-none hover:bg-blue-800">
                                    Edit
                                </button>
                            </td>
                            <!-- checking if the task was created by the logged in user
                            if so, we display the delete button -->
                            @if ($task->createdByMe(auth()->user()))
                                <td class="px-4 text-center pb-5 ">
                                    <form action="{{ route('deletetask', $task) }}" method="post">
                                    @csrf
                                        <button id="deletebutton" type="submit" class="text-sm bg-red-500 rounded-xl px-3 py-2 shadow-md text-white focus:outline-none hover:bg-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        <tr >
                            <div>
                                <div class="text-center mx-auto hidden" id="editmenu{{ $task->id }}">Editing task {{ $task->id }}

                                <form action="{{ route('updatetask') }}" method="post">
                                    @csrf
                                    <div class="shadow-md p-5 rounded-lg lg:w-72 mx-auto">

                                        <div class="invisible">
                                            <input type="text" value="{{ $task->id }}" name="id">
                                        </div>

                                        <div class="col-span-4">
                                            <label for="description" class="block text-sm text-left font-medium text-gray-700">Task description</label>
                                            <input type="text" name="description" value="{{ $task->taskdesc }}" id="description" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                        
                                        @error('description')
                                            <div class="text-red-500 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                        
                        
                                        <div class="col-span-4">
                                            <label for="priority" class="block text-sm pt-3 text-left font-medium text-gray-700">Select new priority (<i>previously {{ $task->priority }}</i>)</label>
                                            <select name="priority" id="priority" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <div>
                                                        <option>Low</option>
                                                        <option>Medium</option>
                                                        <option>High</option>
                                                        <option>Critical</option>
                                                </div>
                                            </select>
                                        </div>
                                        
                                        <div class="col-span-4">
                                            
                                            <label for="datepicker" class="block text-left text-sm pt-3 font-medium text-gray-700">Due date</label>
                                            <input type="datetime-local" id="datepicker" value="<?=str_replace(' ', 'T', $task->dueDate)?>" name="date" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        @error('date')
                                            <div class="text-red-500 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror

                                        <div class="col-span-4">
                                            <label for="status" class="block text-left text-sm pt-3 font-medium text-gray-700">New status (<i>previously {{ $task->status }}</i>)</label>
                                            <select name="status" id="status" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <div class="border-4 rounded-lg">
                                                    <option>Pending</option>
                                                    <option>In progress</option>
                                                    <option>Complete</option>
                                                </div>
                                            </select>
                                        </div>

                                        <div class="pt-4 text-left">
                                            <button type="submit" id="submit" class="py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </tr>
                    </tbody>

                    <!-- script to handle each edit button appearing -->
                    <script>
                        $(document).ready(function(){
                            $("#editbutton{{ $task->id }}").click(function() {
                                $("#editmenu{{ $task->id }}").slideToggle();                                
                            });
                        });
                    </script>
                @endforeach
            @else
                <div class="text-lg mx-auto">
                    <p>
                        No tasks yet!
                    </p>
                </div>
            @endif
            
                
            
        </table>
    </div>

    
@endsection
