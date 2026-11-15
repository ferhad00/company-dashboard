<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Task;
use App\Models\Team;


class TaskMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $task=Task::find($request->route('id'));
      $team=Team::where('id',$task->team_user->team_id)->first();
      if($team->id!=$task->team_user->team_id && auth()->user()->team->manager_id!=$team->manager_id )
      {
          return redirect()->back()->withErrors('you must be manager to complete this task');
      }

    return $next($request);}


}
