<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $tasks = task::get(); // return all tasks

        return view('dashboard', [
            'tasks' => $tasks
        ]);
    }
}
