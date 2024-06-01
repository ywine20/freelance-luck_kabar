@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Brand</h1>
        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
