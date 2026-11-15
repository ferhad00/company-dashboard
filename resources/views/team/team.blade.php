<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $team->name }} Team</title>
    <style>
        .tables-container {
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

        caption {
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 1.1em;
            text-align: left;
        }
         button, .button-container a {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        button {
            background-color: #4a5568;
            color: white;
        }

        button:hover {
            background-color: #2d3748;
            transform: translateY(-2px);
        }

        .button-container a button {
            background-color: #4299e1;
        }

        .button-container a button:hover {
            background-color: #2b6cb0;
        }
        }
    </style>
    </head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<h2>{{ $team->name }} Team</h2>
@if(auth()->user()->isAdmin)
  <div class="button-container">

 <a href='/team/edit/{{ $team->id }}'><button type="submit">edit</button></a>
 <form action={{ route('team.destroy',$team->id) }} method="post">
    @csrf
    @method("DELETE")
     <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this team?')">
                                        Delete </button>
 </form></div>
 @endif
<body>
<div class="tables-container">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <caption>Users</caption>
          <thead>
            <tr>
              <th>Username</th>
            </tr>
          </thead>
          <tbody>
            @foreach($team->users as $user)

            <tr>
            <td> <a href="/user/tasks/{{$user->pivot->id }}" @if($user->id==$team->manager_id) style='color:red;'@endif>   {{ $user->username }}</a>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

</body>
</html>
