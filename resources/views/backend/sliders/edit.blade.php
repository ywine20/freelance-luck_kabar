@extends('backend.layouts.app')

@section('content')
    <h1>Edit Slider</h1>
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $slider->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Current Image:</label>
            <div>
                <img src="{{ asset('images/sliders/' . $slider->image) }}" alt="{{ $slider->name }}" width="100">
            </div>
        </div>
        <div class="form-group">
            <label for="image">New Image (optional):</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ $slider->link }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
