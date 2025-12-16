@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4"><div class="col-md-8"><h1>Supply Items</h1></div><div class="col-md-4 text-end"><a href="{{ route('supply-items.create') }}" class="btn btn-primary">+ Add</a></div></div>
    @if ($message = Session::get('success'))<div class="alert alert-success alert-dismissible fade show">{{ $message }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
    <table class="table"><thead class="table-dark"><tr><th>ID</th><th>Name</th><th>Category</th><th>Stock</th><th>Actions</th></tr></thead><tbody>
        @forelse ($items as $item)
            <tr><td>{{ $item->item_id }}</td><td>{{ $item->name }}</td><td>{{ $item->category }}</td><td>{{ $item->quantity_in_stock }}</td><td>
                <a href="{{ route('supply-items.show', $item->item_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('supply-items.edit', $item->item_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('supply-items.destroy', $item->item_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
            </td></tr>
        @empty
            <tr><td colspan="5" class="text-center">No items found.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
