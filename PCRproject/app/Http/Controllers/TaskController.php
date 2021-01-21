<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function saveTask(Request $request){

        // validation for task
        $this->validate($request, [
            'description' => 'required|max:200|min:5',
            'date' => 'required',
            'assignedto' => 'required|max:100'
        ]);


        // add task to db
        $request->user()->tasks()->create([
            'dueDate' => $request->date,
            'taskdesc' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'assignedto' => $request->assignedto,
        ]);

        return redirect()->route('dashboard');
    }

    public function updateTask(Request $request){

        // validation for task update
        $this->validate($request, [
            'description' => 'required|max:200|min:5',
            'date' => 'required',
        ]);


        // upating the selected entry with the updated information -- 
        // the instructions did not indicate if all users should have access
        // to update any task, so I let all users have that ability
        $task = task::find($request->id)
        ->update([
            'taskdesc' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'dueDate' => $request->date
        ]);
        
        return redirect()->route('dashboard');
    }

    public function deleteTask(task $task){
        $task->delete();
        
        return redirect()->route('dashboard');
    }
}
