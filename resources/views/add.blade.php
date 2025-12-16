<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body>
    <h1>Add Request</h1>
    <form action="{{url('/create')}}" method="post">
        @csrf
        Name: <input type="text" name="Name" id="">
        <button type="submit">Confirm</button>
        <br>
        <a href="{{'/users'}}">View request</a>
    </form>
</body>
</html>