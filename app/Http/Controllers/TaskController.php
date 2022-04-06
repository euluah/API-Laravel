<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'max:30|min:5',
            'description' => 'max:100|min:5',
            'completed_at' => 'required|date|before:today'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        return Task::create($request->all());
    }

    function index(Request $request) 
    {
       // dd($request->all());
        $task = Task::paginate();
        return response()->json($task);
    }

    public function find($id)
    {
        return Task::findOrFail($id);
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }

    public function update($id){
        $task = Task::findOrFail($id);
        $task->update();
        return response()->json(null, 204);
    }
}
