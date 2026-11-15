<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .signup-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .login-link {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Add User</h2>
        <form method="post" action="/signupAccess">
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Create a username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Create a password">

            <!-- Admin Checkbox -->
           @guest
            <div class="checkbox-container">
                <input type='hidden'  id="isAdmin" name="isAdmin" value="0">
                <input type='checkbox'  id="isAdmin" name="isAdmin" value="1">
                <label for="is_admin">Is Admin?</label>
            </div>
            @else
            <input type="hidden" name='isAdmin' value="0">
            @endguest

            <button type="submit">Add User</button>
            @if($errors->any())
            <div calss="alert-danger">
                <ul>@foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                </ul>
            </div>
            @endif
        </form>
        @if(!Auth::check())
        <div class="login-link">
            <p>Already have an account? <a href="/">Login here</a></p>
        </div>
        @endif
    </div>
</body>
</html>
