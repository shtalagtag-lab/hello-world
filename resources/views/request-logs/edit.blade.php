@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Request Log</h1>
    <form action="{{ route('request-logs.update', $requestLog->log_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label>Request</label><select name="request_id" class="form-select" required>
            @foreach ($requests as $r)
                <option value="{{ $r->request_id }}" {{ old('request_id', $requestLog->request_id) == $r->request_id ? 'selected' : '' }}>#{{ $r->request_id }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Action Type</label><input type="text" name="action_type" class="form-control" value="{{ old('action_type', $requestLog->action_type) }}" required></div>
        <div class="mb-3"><label>Action Date & Time</label><input type="datetime-local" name="action_date" class="form-control" value="{{ old('action_date', $requestLog->action_date->format('Y-m-d\TH:i')) }}" required></div>
        <div class="mb-3"><label>Performed By</label><select name="performed_by" class="form-select" required>
            @foreach ($staff as $s)
                <option value="{{ $s->staff_id }}" {{ old('performed_by', $requestLog->performed_by) == $s->staff_id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select></div>
        <button type="submit" class="btn btn-primary">Update</button> <a href="{{ route('request-logs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
