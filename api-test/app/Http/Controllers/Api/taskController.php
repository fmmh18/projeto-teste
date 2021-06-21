<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;

class taskController extends Controller
{
    public function index()
    {
        $task = Task::all();
        return response()->json($task);
    }


    public function show($id)
    {
        $task = Task::find($id);

        return response()->json($task);
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());

        return response()->json($task);
    }
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->name = $request->name;
        $task->date_conclusion = $request->date_conclusion;
        $task->status = $request->status;

        $data = $task->save();

        return response()->json($data);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        $data = $task->delete();

        return response()->json($data);
    }
}
