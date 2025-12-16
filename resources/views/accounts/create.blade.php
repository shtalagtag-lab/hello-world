@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Account</h1>
    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Staff</label><select name="staff_id" class="form-select @error('staff_id') is-invalid @enderror" required>
            <option>-- Select Staff --</option>
            @foreach ($staff as $s)
                <option value="{{ $s->id }}" {{ old('staff_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Username</label><input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required></div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
