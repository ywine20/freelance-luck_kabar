@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Car</h1>
        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="brand_id">Brand:</label>
                <select name="brand_id" id="brand_id" class="form-control">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $car->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="company_id">Company:</label>
                <select name="company_id" id="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $car->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="series_id">Series:</label>
                <select name="series_id" id="series_id" class="form-control">
                    @foreach($series as $serie)
                        <option value="{{ $serie->id }}" {{ $car->series_id == $serie->id ? 'selected' : '' }}>{{ $serie->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="model_id">Model:</label>
                <select name="model_id" id="model_id" class="form-control">
                    @foreach($models as $model)
                        <option value="{{ $model->id }}" {{ $car->model_id == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year_id">Year:</label>
                <select name="year_id" id="year_id" class="form-control">
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{ $car->year_id == $year->id ? 'selected' : '' }}>{{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $car->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
