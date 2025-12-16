@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Supply Item</h1>
    <form action="{{ route('supply-items.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required></div>
        <div class="mb-3"><label>Category</label><input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" required></div>
        <div class="mb-3"><label>Quantity in Stock</label><input type="number" name="quantity_in_stock" class="form-control @error('quantity_in_stock') is-invalid @enderror" value="{{ old('quantity_in_stock', 0) }}" min="0" required></div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ route('supply-items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
