@extends('frames.app')

@section('content')
    <div class="text-lg p-5">
        

        <!-- checking if there are any posts in the database, then showing a table row for each task -->
        @if ($tasks->count())
        <p class="text-left text-2xl font-semibold mx-auto">Shared tasks - Home</p>
        <table class="min-w-full overflow-hidden  border-collapse rounded-lg mx-auto mt-10 shadow-xl">
            <thead class="text-base">
                    <tr>
                        <th class="w-1/2 pb-5 pt-6 bg-gray-200 text-left pl-5 text-blue-500">Task</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500">Priority</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500">Due</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500">Author</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500">Status</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500">For</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500">Posted</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500">Updated</th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500"></th>
                        <th class="pb-5 pt-6 bg-gray-200 text-blue-500"></th>
                    </tr>
            </thead>

            
                <!-- taking in the tasks collection one at a time as an object called task
                we can get each attribute from the collection here -->
                @foreach ($tasks->sortByDesc('created_at') as $task)
                    <tbody>
                        <tr class="rounded-xl bg-gray-100 hover:bg-white overflow-hidden">
                            <td class="text-left py-5 pl-5">{{ $task->taskdesc }}</td>
                            <td class="px-4 text-center py-5 ">{{ $task->priority }}</td>
                            <td class="px-4 text-center py-5 text-base">{{ date('M j, h:ia', strtotime($task->dueDate)) }}</td>
                            <td class="px-4 text-center py-5 ">{{ $task->user->name }}</td>
                            <td class="px-4 text-center py-5">{{ $task->status }}</td>
                            <td class="px-4 text-center py-5">{{ $task->assignedTo }}</td>
                            <td class="px-4 text-center py-5 text-base">{{ $task->created_at->format('M j, h:ia') }}</td>
                            <td class="px-4 text-center py-5 text-base">{{ $task->updated_at->format('M j, h:ia') }}</td>
                            <td class="px-4 text-center py-5 ">
                                <button id= "editbutton{{ $task->id }}" class="text-sm bg-blue-500 rounded-3xl px-3 py-2 shadow-md text-white focus:outline-none hover:bg-blue-800">
                                    Edit
                                </button>
                            </td>
                            <!-- checking if the task was created by the logged in user
                            if so, we display the delete button -->
                            @if ($task->createdByMe(auth()->user()))
                                <td class="px-4 text-center">
                                    <form action="{{ route('deletetask', $task) }}" method="post">
                                    @csrf
                                        <button id="deletebutton" type="submit" class="text-sm bg-red-500 rounded-3xl px-3 py-2 shadow-md text-white focus:outline-none hover:bg-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            @else  
                                <td></td>
                            @endif
                        </tr>
                        <tr>
                                <!-- this is the code for the edit menu - hidden until the edit button is clicked and handled
                                by the jquery script -->
                                <div>
                                    <div class="text-center mx-auto hidden" id="editmenu{{ $task->id }}">
                                    

                                    <form action="{{ route('updatetask') }}" method="post">
                                        @csrf
                                        <div class="shadow-md p-5 rounded-lg lg:w-72 mx-auto">
                                            <!-- code for x button- handled by jquery script -->
                                            <div class="float-right cursor-pointer" id="closebutton{{ $task->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>

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

                            $("#closebutton{{ $task->id }}").click(function(){
                                $("#editmenu{{ $task->id }}").slideToggle();
                            });
                        });
                    </script>
                @endforeach
            @else
                <div class="text-xl text-center">
                    <p>
                        <span>No tasks yet! Click on <p class="text-center mx-auto bg-blue-400 rounded-3xl text-white px-5 py-2 my-3 w-36">Add a task</p> at the top to begin. </span>
                    </p>
                </div>
            @endif
            
                
            
        </table>
    </div>

    
@endsection
