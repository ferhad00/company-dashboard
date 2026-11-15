<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Team</title>
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
    <h2>Edit Team: {{ $team->name }}</h2>
    <form action="{{ route('team.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="form-group">
            <label for="name">Team Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $team->name) }}" required>
        </div>

        <div class="form-group">
            <label>Select Team Members</label>
            <div class="member-list">
                {{-- Loop over $users (which contains ALL users in the system) to show all selection options. --}}
                @foreach ($users as $user)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="user_ids[]" value="{{ $user->id }}" id="user_{{ $user->id }}"
                               {{-- Check if the current user's ID is in the old input (if validation failed)
                                   OR if the $selectedUsers collection (current team members) contains this user. --}}
                               {{ old('user_ids') && in_array($user->id, old('user_ids')) ? 'checked' : ($selectedUsers->contains('id', $user->id) ? 'checked' : '') }}>
                        <label class="form-check-label" for="user_{{ $user->id }}">{{ $user->username }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="manager_id">Assign a Team Manager</label>
            <select name="manager_id" id="manager_id" class="form-control" required>
                <option value="">-- Select Manager --</option>
                {{-- Loop over $users (which contains ALL users in the system) for manager options. --}}
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ (old('manager_id', $team->manager_id) == $user->id) ? 'selected' : '' }}>
                        {{ $user->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Team</button>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
</body>
</html>
