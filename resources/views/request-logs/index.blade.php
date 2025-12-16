@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4"><div class="col-md-8"><h1>Request Logs</h1></div><div class="col-md-4 text-end"><a href="{{ route('request-logs.create') }}" class="btn btn-primary">+ Add</a></div></div>
    <table class="table table-sm"><thead class="table-dark"><tr><th>ID</th><th>Request</th><th>Action</th><th>Date</th><th>By</th><th>Actions</th></tr></thead><tbody>
        @forelse ($logs as $log)
            <tr><td>{{ $log->log_id }}</td><td>#{{ $log->request_id }}</td><td>{{ $log->action_type }}</td><td>{{ $log->action_date }}</td><td>{{ $log->performer->name ?? 'N/A' }}</td><td>
                <a href="{{ route('request-logs.show', $log->log_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('request-logs.edit', $log->log_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('request-logs.destroy', $log->log_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Del</button></form>
            </td></tr>
        @empty
            <tr><td colspan="6" class="text-center">No logs found.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
