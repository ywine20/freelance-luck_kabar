@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Series</h1>
        <form action="{{ route('admin.series.update', $series->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $series->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
