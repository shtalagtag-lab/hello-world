@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Staff Management</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('staff.create') }}" class="btn btn-primary">+ Add Staff</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staff as $member)
                    <tr>
                        <td>{{ $member->staff_id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->department->department_name ?? 'N/A' }}</td>
                        <td>{{ $member->role }}</td>
                        <td>
                            <a href="{{ route('staff.show', $member->staff_id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('staff.edit', $member->staff_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('staff.destroy', $member->staff_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No staff members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
