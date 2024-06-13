@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Items</h1>
        <a href="{{ route('admin.items.create') }}" class="btn btn-primary mb-3">Create New Item</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand Name</th>
                    <th>Second Category</th>
                    <th>Main Category</th>
                    <th>Images</th>
                    <th>Is Feature</th>
                    <th>OE Number</th>
                    <th>Price</th>
                    <th>Cars</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->brandName }}</td>
                        <td>{{ $item->secondCategory->name }}</td>
                        <td>{{ $item->mainCategory->name }}</td>
                        <td>
                            @foreach ($item->images as $image)
                                <img src="{{ asset($image->path) }}" alt="{{ $item->name }}" width="100">
                            @endforeach
                        </td>
                        <td>{{ $item->is_feature ? 'Yes' : 'No' }}</td>
                        <td>{{ $item->OE_No }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            @foreach ($item->cars as $car)
                                {{ $car->description }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
