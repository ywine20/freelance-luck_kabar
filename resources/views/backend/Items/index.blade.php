@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Items</h1>
    <a href="{{ route('admin.items.create') }}" class="btn btn-primary mb-3">Create New Item</a>
    <table id="items-table" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand Name</th>
                <th>Second Category</th>
                <th>Main Category</th>
                <th>Image</th>
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
                    @if ($item->images->isNotEmpty())
                    <a href="#" data-toggle="modal" data-target="#imagesModal{{ $item->id }}">
                        <img src="{{ asset($item->images->first()->path) }}" alt="{{ $item->name }}" width="100">
                    </a>
                    @if ($item->images->count() > 1)
                    <br>
                    <small>+{{ $item->images->count() - 1 }} more</small>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="imagesModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="imagesModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imagesModalLabel{{ $item->id }}">All Images for {{ $item->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($item->images as $image)
                                    <img src="{{ asset($image->path) }}" alt="{{ $item->name }}" class="img-fluid mb-2">
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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
