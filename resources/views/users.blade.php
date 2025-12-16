<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>ClientID</th>
            <th>Name</th>
            <th>PersonalInfo</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($account as $acc)
                <tr>
                    <td>{{$acc->status_id}}</td>
                    <td>{{$acc->Name}}</td>
                    <td><a href="{{url($acc->status_id.'/edit')}}">Edit</a> <a href="{{url($acc->status_id.'/delete')}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{'/add'}}">Add Account</a>
</body>
</html>