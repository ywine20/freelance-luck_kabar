@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Main Category</h1>
        <form action="{{ route('main_categories.update', $main_category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $main_category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
