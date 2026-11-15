<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <style>
        /* Button Styles */
        .button-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
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
  <h2>Welcome Admin</h2>
  <form method="post" action="/logout">
      @csrf
      <button type="submit">Logout</button>
    </form>
  <div class="button-container">

    <a href='/signup'><button type="submit">Add a User</button></a>
    <a href='/addTeam'><button type="submit">Add a Team</button></a>
  </div>

  <div class="tables-container">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <caption>Users</caption>
          <thead>
            <tr>
              <th>Username</th>
              <th>User Type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $user->username }}</td>
              <td>@if($user->isAdmin) admin @else user @endif</td>
              <td> <form action={{ route('user.destroy',$user->id) }} method="post">
    @csrf
    @method("DELETE")
     <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this team?')">
                                            Delete
                                         </button>
 </form>
 <a href="/edit/{{ $user->id }}"><button class='submet'>edit</button>
</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <caption>Teams</caption>
          <thead>
            <tr>
              <th>Team Name</th>
              <th>Manager</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teams as $team)
            <tr>

            <td><a href="/team/{{$team->id}}">{{ $team->name }}</a></td>
            <td>{{ $team->manager->username }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
