@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Supply Request</h1>
    <form action="{{ route('supply-requests.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Staff</label><select name="staff_ids[]" class="form-select @error('staff_ids') is-invalid @enderror" multiple required>
            @foreach ($staff as $s)
                <option value="{{ $s->staff_id }}" {{ in_array($s->staff_id, old('staff_ids', [])) ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Request Date</label><input type="date" name="request_date" class="form-control @error('request_date') is-invalid @enderror" value="{{ old('request_date') }}" required></div>
        <div class="mb-3"><label>Purpose</label><textarea name="purpose" class="form-control @error('purpose') is-invalid @enderror" required>{{ old('purpose') }}</textarea></div>
        <div class="mb-3"><label>Status</label><select name="status_id" class="form-select @error('status_id') is-invalid @enderror" required>
            <option>-- Select Status --</option>
            @foreach ($statuses as $s)
                <option value="{{ $s->status_id }}" {{ old('status_id') == $s->status_id ? 'selected' : '' }}>{{ $s->status_name }}</option>
            @endforeach
        </select></div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ route('supply-requests.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
