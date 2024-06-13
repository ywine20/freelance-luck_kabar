@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Cars</h1>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Create Car</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Company</th>
                    <th>Series</th>
                    <th>Engine Power</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->company->name }}</td>
                        <td>{{ $car->series->name }}</td>
                        <td>{{ $car->enginePower ? $car->engine->enginepower : 'N/A' }}</td>
                        <td>{{ $car->model->name }}</td>
                        <td>{{ $car->year->year }}</td>
                        <td>{{ $car->description }}</td>
                        <td>
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline">
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
