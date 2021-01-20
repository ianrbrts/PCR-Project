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
                            <td class="px-4 text-center pb-5 "><button id= "editbutton{{ $task->id }}" class="text-sm bg-blue-500 rounded-xl px-3 py-2 shadow-md text-white focus:outline-none hover:bg-blue-800">Edit</button></td>
                            <td class="px-4 text-center pb-5 "><button id="deletebutton" class="text-sm bg-red-500 rounded-xl px-3 py-2 shadow-md text-white focus:outline-none hover:bg-red-800">Delete</button></td>
                        </tr>
                        <tr >
                            <div>
                                <p class="text-center mx-auto hidden" id="editmenu{{ $task->id }}">This is for task id {{ $task->id }}</p>
                            </div>
                        </tr>
                    </tbody>

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
