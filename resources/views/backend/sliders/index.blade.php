@extends('backend.layouts.app')

@section('content')
    <h1>Sliders</h1>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Create Slider</a>
    <table class="table mt-3">
        <thead>
        <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>
                        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
