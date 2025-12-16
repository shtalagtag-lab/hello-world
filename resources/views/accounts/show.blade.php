@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Account: {{ $account->user_name }}</h1>
    <p><strong>Staff:</strong> {{ $account->staff->name ?? 'N/A' }}</p>
    <a href="{{ route('accounts.edit', $account->account_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('accounts.destroy', $account->account_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
    <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
