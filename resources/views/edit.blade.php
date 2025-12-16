<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
</head>
<body>
    <h1>Edit Client</h1>
    <form action="{{url($AccountEdit[0]->status_id.'/update')}}" method="post">
        @csrf
        Name: <input type="text" name="Name" id="" value="{{$AccountEdit[0]->Name}}">
        <button type="submit">Confirm</button>
        <br>
        <a href="{{'/users'}}">View Account</a>
    </form>
</body>
</html>