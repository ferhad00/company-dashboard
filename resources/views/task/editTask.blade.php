<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
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
        .container mt-4 {
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
        input[type="text"]{
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
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
        </style>
</head>
<body>
<div class="container mt-4">
    <h2>Edit a Task</h2>
    <form action='/editTask/submit/{{ $id }}' method="POST">
        @csrf
        @method("PUT")
 <div class="form-group">
            <label for="title">Task Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <input type="hidden" name="back" value="{{ url()->previous() }}"}}>
  <button type="submit">submit</button>
           <div calss="alert-danger">
                <ul>@foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
    </form>
</div>
</body>
</html>
