<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //read list
    public function index()
    {
        $tasks = Task::with('user')->get();

        return view('tasks.index', compact('tasks'));
    }

    //create task
    public function createTask()
    {
        $users = User::all();

        return view('tasks.create', compact('users'));
    }

    //store new
    public function storeTask(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'id' => 'required',
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->user_id = $request->id;
        $task->save();

        return redirect()->route('index')->with('success', 'New value added');
    }

    //edit page
    public function editTask($id)
    {
        $task = Task::find($id);
        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    //update edit
    public function updateTask(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|alpha',
            'id' => 'required',
        ]);

        $task = Task::find($id);
        $task->name = $request->get('name');
        $task->user_id = $request->get('id');
        $task->save();

        return redirect()->route('index')->with('success', 'Updated successfully');
    }

    //delete task
    public function deleteTask($id)
    {
        Task::destroy($id);

        return back()->with('success', 'Deleted successfully');
    }
}
