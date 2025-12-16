@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Request Detail</h1>
    <form action="{{ route('request-details.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Request</label><select name="request_id" class="form-select" required>
            <option>-- Select Request --</option>
            @foreach ($requests as $r)
                <option value="{{ $r->request_id }}" {{ old('request_id', $requestId) == $r->request_id ? 'selected' : '' }}>#{{ $r->request_id }} - {{ $r->purpose }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Item</label><select name="item_id" class="form-select" required>
            <option>-- Select Item --</option>
            @foreach ($items as $i)
                <option value="{{ $i->item_id }}" {{ old('item_id') == $i->item_id ? 'selected' : '' }}>{{ $i->name }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Quantity Requested</label><input type="number" name="quantity_requested" class="form-control" value="{{ old('quantity_requested') }}" min="1" required></div>
        <div class="mb-3"><label>Quantity Issued</label><input type="number" name="quantity_issued" class="form-control" value="{{ old('quantity_issued', 0) }}" min="0" required></div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ request('request_id') ? route('supply-requests.show', request('request_id')) : route('request-details.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
