@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Engine Power</h1>
        <form action="{{ route('admin.engine_powers.update', $enginePower->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="enginepower">Engine Power</label>
                <input type="text" class="form-control" id="enginepower" name="enginepower" value="{{ $enginePower->enginepower }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
