<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        //fetch all the data 
        $tasks = Task::all();

        //return the viwe with the task data 
        return view('tasks.index',compact('tasks'));
    }

    //show form to create a new task 
    public function create(){
        return view('tasks.create');
    }

    //store a new task in database
    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:225',
            'description'=>'nullable|string',
        ]);

        Task::create([
            'title' =>$request->title,
            'description' =>$request->description,
        ]);
        return redirect()->route('tasks.index')-with('success','task created successfully');
    }

    //to show form to edit a task
    public function show(Task $task){
        return view('tasks.show',compact('task'));
    }

    //update a task in database
    public function update(Request $request,Task $task){
        $request->validate([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->route('tasks.index')->with('Success','Task update Successfully');
    }

    //delete a task
    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task deleted successfully');
    }
}

