@extends('backend.layouts.app')

@section('content')
    <h1>Create Slider</h1>
    <form action="{{ route('admin.sliders.store') }}" method="POST">
        @csrf
        <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
                <small class="form-text text-muted">Accepted file types: jpeg, png, jpg, gif, svg.</small>
    </div>

            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" name="link" id="link" class="form-control">
            </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
