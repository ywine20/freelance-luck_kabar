@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">Create Company</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>
                            <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" style="display:inline">
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
