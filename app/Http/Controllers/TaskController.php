<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTask;
use App\Http\Requests\UpdateTask;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * read list
    */
    public function index()
    {
        $tasks = Task::with('user')->get();

        return view('tasks.index', compact('tasks'));
    }


    public function createTask()
    {
        $users = User::all();

        return view('tasks.create', compact('users'));
    }

    /**
    * create new
    */
    public function storeTask(AddTask $request)
    {
        Task::create($request->all());

        return redirect()->route('index')->with('success', trans('added'));
    }

    /**
    * edit page
    */
    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    /**
    * update edit
    */
    public function updateTask(AddTask $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('index')->with('success', trans('updated'));
    }

    /**
    * delete
    */
    public function deleteTask($id)
    {
        Task::destroy($id);

        return back()->with('success', trans('deleted'));
    }
}
