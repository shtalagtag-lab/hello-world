@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4"><div class="col-md-8"><h1>Accounts</h1></div><div class="col-md-4 text-end"><a href="{{ route('accounts.create') }}" class="btn btn-primary">+ Add</a></div></div>
    <table class="table"><thead class="table-dark"><tr><th>ID</th><th>Staff</th><th>Username</th><th>Actions</th></tr></thead><tbody>
        @forelse ($accounts as $account)
            <tr><td>{{ $account->account_id }}</td><td>{{ $account->staff->name ?? 'N/A' }}</td><td>{{ $account->user_name }}</td><td>
                <a href="{{ route('accounts.show', $account->account_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('accounts.edit', $account->account_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('accounts.destroy', $account->account_id) }}" method="POST" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button></form>
            </td></tr>
        @empty
            <tr><td colspan="4" class="text-center">No accounts found.</td></tr>
        @endforelse
    </tbody></table>
</div>
@endsection
