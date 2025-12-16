@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Request Limit Rule</h1>
    <form action="{{ route('request-limit-rules.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Department</label><select name="department_id" class="form-select" required>
            @foreach ($departments as $d)
                <option value="{{ $d->id }}" {{ old('department_id') == $d->id ? 'selected' : '' }}>{{ $d->department_name }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Staff</label><select name="staff_id" class="form-select" required>
            @foreach ($staff as $s)
                <option value="{{ $s->id }}" {{ old('staff_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Item</label><select name="item_id" class="form-select" required>
            @foreach ($items as $i)
                <option value="{{ $i->id }}" {{ old('item_id') == $i->id ? 'selected' : '' }}>{{ $i->name }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Limit Quantity</label><input type="number" name="limit_quantity" class="form-control" value="{{ old('limit_quantity') }}" min="1" required></div>
        <div class="mb-3"><label>Rule Type</label><input type="text" name="rule_type" class="form-control" value="{{ old('rule_type') }}" placeholder="e.g., monthly, annual" required></div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ route('request-limit-rules.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
