<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Managing {{ $team->name }} Team</title>
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
</style>
<h2>Managing {{ $team->name }} Team</h2>
</head>
<body>
<div class="tables-container">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Username</th>
              <th>Task</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user )
            <tr>

              <td>{{ $user->username }} </td>
              <td></td>
              <td><a><button class="submit">finished</button></a></td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

</body>
</html>
