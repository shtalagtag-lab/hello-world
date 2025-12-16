@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Supply Request #{{ $supplyRequest->request_id }}</h1>
    <p><strong>Staff:</strong> {{ $supplyRequest->staff->pluck('name')->join(', ') ?? 'N/A' }}</p>
    <p><strong>Date:</strong> {{ $supplyRequest->request_date }}</p>
    <p><strong>Purpose:</strong> {{ $supplyRequest->purpose }}</p>
    <p><strong>Status:</strong> {{ $supplyRequest->status->status_name ?? 'N/A' }}</p>
    
    <h4 class="mt-4">Details</h4>
    @if ($supplyRequest->details && count($supplyRequest->details) > 0)
        <table class="table table-sm"><thead class="table-dark"><tr><th>Item</th><th>Requested</th><th>Issued</th><th>Actions</th></tr></thead><tbody>
            @foreach ($supplyRequest->details as $detail)
                <tr><td>{{ $detail->item->name ?? 'N/A' }}</td><td>{{ $detail->quantity_requested }}</td><td>{{ $detail->quantity_issued }}</td><td><a href="{{ route('request-details.edit', $detail->detail_id) }}" class="btn btn-sm btn-warning">Edit</a> <form action="{{ route('request-details.destroy', $detail->detail_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button></form></td></tr>
            @endforeach
        </tbody></table>
    @else
        <p class="text-muted">No details added yet.</p>
    @endif
    
    <a href="{{ route('request-details.create', ['request_id' => $supplyRequest->request_id]) }}" class="btn btn-sm btn-success mt-2">+ Add Detail</a>
    
    <div class="mt-4">
        <a href="{{ route('supply-requests.edit', $supplyRequest->request_id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('supply-requests.destroy', $supplyRequest->request_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
        <a href="{{ route('supply-requests.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
