@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Main Category</h1>
        <form action="{{ route('admin.main_categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="OE_No">OE No</label>
                <input type="text" class="form-control" id="OE_No" name="OE_No" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" class="form-control" id="total_price" name="total_price" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
