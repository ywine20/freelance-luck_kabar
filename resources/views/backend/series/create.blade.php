@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Car Model</h1>
        <form action="{{ route('admin.car_models.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="series_id">Series</label>
                <select name="series_id" class="form-control" required>
                    @foreach ($series as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
