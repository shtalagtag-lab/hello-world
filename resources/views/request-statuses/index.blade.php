@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4"><div class="col-md-8"><h1>Request Statuses</h1></div><div class="col-md-4 text-end"><a href="{{ route('request-statuses.create') }}" class="btn btn-primary">+ Add</a></div></div>
    <table class="table"><thead class="table-dark"><tr><th>ID</th><th>Status Name</th><th>Actions</th></tr></thead><tbody>
        @forelse ($statuses as $status)
            <tr><td>{{ $status->status_id }}</td><td>{{ $status->status_name }}</td><td>
                <a href="{{ route('request-statuses.show', $status->status_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('request-statuses.edit', $status->status_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('request-statuses.destroy', $status->status_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
            </td></tr>
        @empty
            <tr><td colspan="3" class="text-center">No statuses found.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
