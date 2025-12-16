@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Request Log #{{ $requestLog->id }}</h1>
    <p><strong>Request:</strong> #{{ $requestLog->request_id }}</p>
    <p><strong>Action:</strong> {{ $requestLog->action_type }}</p>
    <p><strong>Date & Time:</strong> {{ $requestLog->action_date }}</p>
    <p><strong>Performed By:</strong> {{ $requestLog->performer->name ?? 'N/A' }}</p>
    <a href="{{ route('request-logs.edit', $requestLog->log_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('request-logs.destroy', $requestLog->log_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
    <a href="{{ route('request-logs.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
