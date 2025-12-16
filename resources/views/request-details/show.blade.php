@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Request Detail #{{ $requestDetail->id }}</h1>
    <p><strong>Request:</strong> #{{ $requestDetail->request->id }}</p>
    <p><strong>Item:</strong> {{ $requestDetail->item->name ?? 'N/A' }}</p>
    <p><strong>Qty Requested:</strong> {{ $requestDetail->quantity_requested }}</p>
    <p><strong>Qty Issued:</strong> {{ $requestDetail->quantity_issued }}</p>
    <a href="{{ route('request-details.edit', $requestDetail->detail_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('request-details.destroy', $requestDetail->detail_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
    <a href="{{ route('request-details.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
