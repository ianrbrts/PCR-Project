@extends('frames.app')

@section('content')
    <div class="text-lg p-5">
        <p class="text-left text-2xl bold mx-auto">Public tasks</p>

        

        <table class="table-fixed border-collapse bg-white border-4 border-opacity-10 hover:border-opacity-25 rounded-lg mx-auto mt-10 shadow-md">
            <thead class="justify-between">
                    <tr class="">
                        <th class="w-1/4 pb-5">Task description</th>
                        <th class="w-1/8 pb-5">Date posted</th>
                        <th class="w-1/8 pb-5">Priority</th>
                        <th class="w-1/8 pb-5">Author</th>
                        <th class="w-1/8 pb-5">Due</th>
                        <th class="w-1/8 pb-5">Status</th>
                        <th class="w-1/8 pb-5">Assigned to</th>
                    </tr>
            </thead>

            @if ($tasks->count())
                @foreach ($tasks as $task)
                    <tbody>
                        <tr>
                            <td class="px-4 text-center pb-5 ">{{ $task->taskdesc }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->created_at }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->priority }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->user->name }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->dueDate }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->status }}</td>
                            <td class="px-4 text-center pb-5 ">{{ $task->assignedTo }}</td>
                        </tr>
                    </tbody>
                @endforeach
            @else
                there are no tasks here
            @endif
            
                
            
        </table>
    </div>
@endsection
