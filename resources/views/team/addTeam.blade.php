<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .member-list {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>Create a New Team</h2>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf

        <!-- Team Name -->
        <div class="form-group">
            <label for="name">Team Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Select Members -->
        <div class="form-group">
            <label>Select Team Members</label>
            <div class="member-list">
                @foreach ($users as $user)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="user_ids[]" value="{{ $user->id }}" id="user_{{ $user->id }}">
                        <label class="form-check-label" for="user_{{ $user->id }}">{{ $user->username }}</label>

                    </div>
                @endforeach
            </div>
        </div>

         <!-- Select Manager (optional: show all users or same as above) -->
        <div class="form-group">
            <label for="manager">Assign a Team Manager</label>
            <select name="manager_id" id="manager_id" class="form-control" required>
                <option value="">-- Select Manager --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Create Team</button>
           <div calss="alert-danger">
                <ul>@foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
    </form>
</div>
</body>
</html>
