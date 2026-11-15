<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Task;
use App\Http\Requests\TeamRequest;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::where('isAdmin','0')->get();
        return view('team.addTeam',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
 public function store(TeamRequest $request)
    {
       $validate=$request->validated();
     if(!in_array($request->manager_id,$request->user_ids))
     {
         return back()->withErrors(['The manager must be one of the selected members.'])->withInput();
     }
     $team=Team::create(['name'=>$validate['name'],'manager_id'=>$validate['manager_id']]);
      $user_id=$validate['user_ids'];
      $team->users()->attach($user_id);
           if(isset($validate['errors']))
            return redirect()->back()->withErrors($validate)->withInput();
    else
            return redirect('/admin');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team=Team::with('users')->find($id);

            return view('team.team',compact('team'));



    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $users=User::all();
     $team=Team::find($id);
     $selectedUsers=$team->users()->get();
     return view('team.editTeam',compact('team','users','selectedUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, string $id)
    {
        $team=Team::find($id);
        $validate=$request->validated();
          if(!in_array($request->manager_id,$request->user_ids))
     {
         return back()->withErrors(['The manager must be one of the selected members.'])->withInput();
     }
        $team->update(['name'=>$validate['name'],'manager_id'=>$validate['manager_id']]);
         $user_id=$validate['user_ids'];
         $team->users()->sync($user_id);
 if(isset($validate['errors']))
            return redirect()->back()->withErrors($validate)->withInput();
    else
           return redirect("/team/$team->id");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $data=Team::find($id);
      $data->users()->detach();
     $data->delete();
       return redirect('/admin');    }
}
