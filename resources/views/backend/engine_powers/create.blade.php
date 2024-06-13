@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Engine Power</h1>
        <form action="{{ route('admin.engine_powers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="enginepower">Engine Power</label>
                <input type="text" class="form-control" id="enginepower" name="enginepower" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
