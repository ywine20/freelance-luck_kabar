@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Series</h1>
        <a href="{{ route('admin.series.create') }}" class="btn btn-primary">Create Series</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($series as $serie)
                    <tr>
                        <td>{{ $serie->id }}</td>
                        <td>{{ $serie->name }}</td>
                        <td>
                            <a href="{{ route('admin.series.edit', $serie->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.series.destroy', $serie->id) }}" method="POST" style="display:inline">
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
