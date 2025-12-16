@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8"><h1>Departments</h1></div>
        <div class="col-md-4 text-end"><a href="{{ route('departments.create') }}" class="btn btn-primary">+ Add</a></div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"><{{ $message }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif
    <table class="table table-hover">
        <thead class="table-dark"><tr><th>ID</th><th>Name</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse ($departments as $dept)
                <tr><td>{{ $dept->department_id }}</td><td>{{ $dept->department_name }}</td><td>
                    <a href="{{ route('departments.show', $dept->department_id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('departments.edit', $dept->department_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $dept->department_id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button>
                    </form>
                </td></tr>
            @empty
                <tr><td colspan="3" class="text-center">No departments found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
