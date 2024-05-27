@extends('backend.layouts.app')

@section('content')
    <h1>Edit Slider</h1>
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $slider->name }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ $slider->link }}">
            </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
