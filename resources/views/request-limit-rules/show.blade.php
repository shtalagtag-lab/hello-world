@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Request Limit Rule #{{ $requestLimitRule->id }}</h1>
    <p><strong>Department:</strong> {{ $requestLimitRule->department->department_name }}</p>
    <p><strong>Staff:</strong> {{ $requestLimitRule->staff->name }}</p>
    <p><strong>Item:</strong> {{ $requestLimitRule->item->name }}</p>
    <p><strong>Limit:</strong> {{ $requestLimitRule->limit_quantity }}</p>
    <p><strong>Type:</strong> {{ $requestLimitRule->rule_type }}</p>
    <a href="{{ route('request-limit-rules.edit', $requestLimitRule->rule_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('request-limit-rules.destroy', $requestLimitRule->rule_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
    <a href="{{ route('request-limit-rules.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
