@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Request Log</h1>
    <form action="{{ route('request-logs.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Request</label><select name="request_id" class="form-select" required>
            @foreach ($requests as $r)
                <option value="{{ $r->id }}" {{ old('request_id') == $r->id ? 'selected' : '' }}>#{{ $r->id }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Action Type</label><input type="text" name="action_type" class="form-control" value="{{ old('action_type') }}" placeholder="e.g., approved, rejected" required></div>
        <div class="mb-3"><label>Action Date & Time</label><input type="datetime-local" name="action_date" class="form-control" value="{{ old('action_date') }}" required></div>
        <div class="mb-3"><label>Performed By</label><select name="performed_by" class="form-select" required>
            @foreach ($staff as $s)
                <option value="{{ $s->id }}" {{ old('performed_by') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select></div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ route('request-logs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
