@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Year</h1>
        <form action="{{ route('admin.years.update', $year->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="series_id">Series</label>
                <select name="series_id" class="form-control" required>
                    @foreach ($series as $s)
                        <option value="{{ $s->id }}" {{ $year->series_id == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" name="year" value="{{ $year->year }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
