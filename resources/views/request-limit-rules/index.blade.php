@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4"><div class="col-md-8"><h1>Request Limit Rules</h1></div><div class="col-md-4 text-end"><a href="{{ route('request-limit-rules.create') }}" class="btn btn-primary">+ Add</a></div></div>
    <table class="table table-sm"><thead class="table-dark"><tr><th>ID</th><th>Department</th><th>Staff</th><th>Item</th><th>Limit</th><th>Actions</th></tr></thead><tbody>
        @forelse ($rules as $r)
            <tr><td>{{ $r->rule_id }}</td><td>{{ $r->department->department_name ?? 'N/A' }}</td><td>{{ $r->staff->name ?? 'N/A' }}</td><td>{{ $r->item->name ?? 'N/A' }}</td><td>{{ $r->limit_quantity }}</td><td>
                <a href="{{ route('request-limit-rules.show', $r->rule_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('request-limit-rules.edit', $r->rule_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('request-limit-rules.destroy', $r->rule_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Del</button></form>
            </td></tr>
        @empty
            <tr><td colspan="6" class="text-center">No rules found.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
