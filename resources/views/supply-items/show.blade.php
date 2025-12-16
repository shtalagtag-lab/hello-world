@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $supplyItem->name }}</h1>
    <p><strong>Category:</strong> {{ $supplyItem->category }}</p>
    <p><strong>Stock:</strong> {{ $supplyItem->quantity_in_stock }}</p>
    <a href="{{ route('supply-items.edit', $supplyItem->item_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('supply-items.destroy', $supplyItem->item_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
    <a href="{{ route('supply-items.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
