@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Staff Member Details</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('staff.index') }}" class="btn btn-secondary">← Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Name</h6>
                            <p>{{ $staff->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Department</h6>
                            <p>{{ $staff->department->department_name ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted">Role</h6>
                            <p>{{ $staff->role }}</p>
                        </div>
                    </div>

                    <div class="pt-3 border-top">
                        <a href="{{ route('staff.edit', $staff->staff_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('staff.destroy', $staff->staff_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
