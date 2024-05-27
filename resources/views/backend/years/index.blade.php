@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Years</h1>
        <a href="{{ route('admin.years.create') }}" class="btn btn-primary">Create Year</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Series</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($years as $year)
                    <tr>
                        <td>{{ $year->id }}</td>
                        <td>{{ $year->series->name }}</td>
                        <td>{{ $year->year }}</td>
                        <td>
                            <a href="{{ route('admin.years.edit', $year->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.years.destroy', $year->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
