@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Main Category</h1>
        <form action="{{ route('main_categories.update', $main_category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $main_category->name }}" required>
            </div>
            <div class="form-group">
                <label for="OE_No">OE No</label>
                <input type="text" class="form-control" id="OE_No" name="OE_No" value="{{ $main_category->OE_No }}" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" class="form-control" id="total_price" name="total_price" value="{{ $main_category->total_price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
