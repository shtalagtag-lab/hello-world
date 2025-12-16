@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Request Status</h1>
    <form action="{{ route('request-statuses.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Status Name</label><input type="text" name="status_name" class="form-control @error('status_name') is-invalid @enderror" value="{{ old('status_name') }}" required></div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ route('request-statuses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
