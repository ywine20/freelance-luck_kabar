@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Engine Powers</h1>
        <a href="{{ route('admin.engine_powers.create') }}" class="btn btn-primary">Create Engine Power</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Engine Power</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enginePowers as $enginePower)
                    <tr>
                        <td>{{ $enginePower->id }}</td>
                        <td>{{ $enginePower->enginepower }}</td>
                        <td>
                            <a href="{{ route('admin.engine_powers.edit', $enginePower->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.engine_powers.destroy', $enginePower->id) }}" method="POST" style="display:inline">
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
