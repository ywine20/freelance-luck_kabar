@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Car Models</h1>
        <a href="{{ route('admin.car_models.create') }}" class="btn btn-primary">Create Car Model</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carModels as $carModel)
                    <tr>
                        <td>{{ $carModel->id }}</td>
                        <td>{{ $carModel->name }}</td>
                        <td>{{ $carModel->company->name }}</td>
                        <td>
                            <a href="{{ route('admin.car_models.edit', $carModel->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.car_models.destroy', $carModel->id) }}" method="POST" style="display:inline">
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
