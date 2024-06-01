@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Second Category</h1>
        <form action="{{ route('admin.second_categories.update', $secondCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $secondCategory->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
