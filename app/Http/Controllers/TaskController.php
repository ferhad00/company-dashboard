<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use App\Models\Team;
use App\Models\Team_user;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new re
     */
    public function create(string $id)
    {

        return view('task.addTask',compact('id'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request,string $id)
    {
           $validate=$request->validated();
           $validate['isCompleted']=false;
           $validate['team_user_id']=$id;
           $task=Task::create($validate);

        if(isset($validate['errors']))
            return redirect()->back()->withErrors($validate)->withInput();
    else
            return redirect("/user/tasks/$id");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teamUser=Team_user::find($id);
        $tasks=$teamUser->tasks;
        $team=Team::find($teamUser->team_id);
        return view('task.userTasks',compact('teamUser','tasks','team'));




    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        return view('task.editTask')->with('id',$request->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
           $validate=$request->validated();
           $validate['isCompleted']=false;
           $task=Task::find($id);
           if($task)
           $task->update($validate);
                  if(isset($validate['errors']))
            return redirect()->back()->withErrors($validate)->withInput();
    else{
            return redirect($request->input('back',url('/')));
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task=Task::find($id);
        if($task)
        $task->delete();

        return redirect()->back();

    }
    public function complete(string $id)
    {
         $task=Task::find($id);
         if($task)
         $task->update(['isCompleted'=>true]);
        return redirect()->back();
    }
}
