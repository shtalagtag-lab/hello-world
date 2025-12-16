@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $requestStatus->status_name }}</h1>
    <a href="{{ route('request-statuses.edit', $requestStatus->status_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('request-statuses.destroy', $requestStatus->status_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
    <a href="{{ route('request-statuses.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
