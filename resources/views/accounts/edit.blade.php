@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Account</h1>
    <form action="{{ route('accounts.update', $account->account_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label>Staff</label><select name="staff_id" class="form-select @error('staff_id') is-invalid @enderror" required>
            @foreach ($staff as $s)
                <option value="{{ $s->id }}" {{ old('staff_id', $account->staff_id) == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select></div>
        <div class="mb-3"><label>Username</label><input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name', $account->user_name) }}" required></div>
        <div class="mb-3"><label>Password (leave blank to keep current)</label><input type="password" name="password" class="form-control @error('password') is-invalid @enderror"></div>
        <button type="submit" class="btn btn-primary">Update</button> <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
