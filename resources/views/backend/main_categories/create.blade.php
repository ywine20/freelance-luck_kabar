@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Main Category</h1>
        <form action="{{ route('admin.main_categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
