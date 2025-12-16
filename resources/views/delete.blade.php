<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Are you sure you want to delete the row "{{$AccountEdit[0]->status_id}}"?
    <a href="{{url($AccountEdit[0]->status_id.'/destroy')}}">Yes</a>
    <a href="{{url('/users')}}">No</a>
</body>
</html>