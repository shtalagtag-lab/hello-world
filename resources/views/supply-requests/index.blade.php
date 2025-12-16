@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4"><div class="col-md-8"><h1>Supply Requests</h1></div><div class="col-md-4 text-end"><a href="{{ route('supply-requests.create') }}" class="btn btn-primary">+ Add</a></div></div>
    <table class="table"><thead class="table-dark"><tr><th>ID</th><th>Staff</th><th>Date</th><th>Purpose</th><th>Status</th><th>Actions</th></tr></thead><tbody>
        @forelse ($requests as $req)
            <tr><td>{{ $req->request_id }}</td><td>{{ $req->staff->pluck('name')->join(', ') ?? 'N/A' }}</td><td>{{ $req->request_date }}</td><td>{{ substr($req->purpose, 0, 30) }}...</td><td>{{ $req->status->status_name ?? 'N/A' }}</td><td>
                <a href="{{ route('supply-requests.show', $req->request_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('supply-requests.edit', $req->request_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('supply-requests.destroy', $req->request_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
            </td></tr>
        @empty
            <tr><td colspan="6" class="text-center">No requests found.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
