@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4"><div class="col-md-8"><h1>Request Details</h1></div><div class="col-md-4 text-end"><a href="{{ route('request-details.create') }}" class="btn btn-primary">+ Add</a></div></div>
    <table class="table table-sm"><thead class="table-dark"><tr><th>ID</th><th>Request</th><th>Item</th><th>Requested</th><th>Issued</th><th>Actions</th></tr></thead><tbody>
        @forelse ($details as $d)
            <tr><td>{{ $d->detail_id }}</td><td>#{{ $d->request_id }}</td><td>{{ $d->item->name ?? 'N/A' }}</td><td>{{ $d->quantity_requested }}</td><td>{{ $d->quantity_issued }}</td><td>
                <a href="{{ route('request-details.show', $d->detail_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('request-details.edit', $d->detail_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('request-details.destroy', $d->detail_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Del</button></form>
            </td></tr>
        @empty
            <tr><td colspan="6" class="text-center">No details found.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
