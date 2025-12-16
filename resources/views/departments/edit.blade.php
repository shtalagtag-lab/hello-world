@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Department</h1>
    @if ($errors->any())
        <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('departments.update', $department->department_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label class="form-label">Department Name</label><input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" value="{{ old('department_name', $department->department_name) }}" required></div>
        <button type="submit" class="btn btn-primary">Update</button> <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
