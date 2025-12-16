@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Department: {{ $department->department_name }}</h1>
    <a href="{{ route('departments.edit', $department->department_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('departments.destroy', $department->department_id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button>
    </form>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
