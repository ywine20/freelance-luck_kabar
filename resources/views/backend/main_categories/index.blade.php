@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Main Categories</h1>
        <a href="{{ route('admin.main_categories.create') }}" class="btn btn-primary">Create Main Category</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>OE No</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mainCategories as $mainCategory)
                    <tr>
                        <td>{{ $mainCategory->id }}</td>
                        <td>{{ $mainCategory->name }}</td>
                        <td>{{ $mainCategory->OE_No }}</td>
                        <td>{{ $mainCategory->total_price }}</td>
                        <td>
                            <a href="{{ route('admin.main_categories.edit', $mainCategory->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.main_categories.destroy', $mainCategory->id) }}" method="POST" style="display:inline">
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
