@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Second Categories</h1>
        <a href="{{ route('admin.second_categories.create') }}" class="btn btn-primary">Create Second Category</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($secondCategories as $secondCategory)
                    <tr>
                        <td>{{ $secondCategory->id }}</td>
                        <td>{{ $secondCategory->name }}</td>
                        <td>
                            <a href="{{ route('admin.second_categories.edit', $secondCategory->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.second_categories.destroy', $secondCategory->id) }}" method="POST" style="display:inline">
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
