<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User's Tasks</title>
    <style> .tables-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            flex: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: 600;
        }
        </style>
    <body>
        <h2>User's Tasks in {{ $team->name }} Group</h2>
        @if(auth()->user()->isAdmin)
        <a href={{ route('task.create',['id'=>$teamUser->id]) }}>
          <button type="submit">Add Task</button></a>
          @endif
        <div class="tables-container">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>

                <th>Task</th>
                <th>Task Statue</th>
                @if(auth()->user()->isAdmin)
                <th> Task Actions</th>@endif
            </tr>
            </thead>
            @isset($tasks)
            @foreach ($tasks as $task)
           <tbody>

            <tr>

              <td>
                {{ $task->title }}
              </td>
              <td>@if($task->isCompleted)
                Completed
                @else
                Pending
                @endif
              </td>
              @if(auth()->user()->isAdmin||auth()->user()->id==$team->manager_id)
              <td>
                @if(auth()->user()->isAdmin)
                <form action={{ route('task.destroy',$task->id) }} method="post">
    @csrf
    @method("DELETE")
     <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this team?')">
                                            Delete Task
                                         </button>
 </form>

                <a href={{ route('task.edit',$task->id) }}><button /type="submit">Edit Task</button></a>
                @elseif(auth()->user()->id==$team->manager_id&& !$task->isCompleted)

                <form action="{{ route('task.complete',$task->id)}}" method="POST">
                  @csrf
                  @method("PUT")
                  <button type="submit">Complete Task</button></a>
                @endif
                @endif
              </td>
            </tr>

          </tbody>
          @endforeach
            @endisset
        </table>
      </div>
    </div>
</div>
        </table>
    </body>
</html>
