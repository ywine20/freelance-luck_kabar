@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Year</h1>
        <form action="{{ route('admin.years.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="series_id">Series</label>
                <select name="series_id" class="form-control" required>
                    @foreach ($series as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" name="year" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
