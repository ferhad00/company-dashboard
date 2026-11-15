<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User page</title>
    <style>
        /* Logout button specific style */
        form[action="/logout"] button {
            background-color: #e53e3e;
        }

        form[action="/logout"] button:hover {
            background-color: #c53030;
        }

        /* Table Container Styles */
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
    </style>
</head>
<body>
  <h2>Welcome {{ auth()->user()->username }}</h2>
  <form method="post" action="/logout">
      @csrf
      <button type="submit">Logout</button>
    </form>

  <div class="tables-container">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <caption>Teams In</caption>
          <thead>
            <tr>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
      @foreach($user->teams as $team)
            <tr>


                 <td> <a href="/user/tasks/{{$team->pivot->id}}">   {{ $team->name }}
                                    </a></td> </tr> @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <caption>Teams managing</caption>
          <thead>
            <tr>
              <th>Team Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user->teams as $team)
            <tr>
         @if($user->id==$team->manager_id)
            <td>
              <a href="/team/{{$team->id}}">{{ $team->name }}</a>
              @endif </td>
              </tr> @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
