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

        echo $request->datepicker;

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
}
