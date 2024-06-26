@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Car</h1>
        <form action="{{ route('admin.cars.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="company_id">Car Company:</label>
                <select name="company_id" id="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="series_id">Series:</label>
                <select name="series_id" id="series_id" class="form-control">
                    @foreach($series as $serie)
                        <option value="{{ $serie->id }}">{{ $serie->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="engine_id">Engine Power:</label>
                <select name="engine_id" id="engine_id" class="form-control">
                    @foreach($engines as $engine)
                        <option value="{{ $engine->id }}">{{ $engine->enginepower }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="model_id">Model:</label>
                <select name="model_id" id="model_id" class="form-control">
                    @foreach($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year_id">Year:</label>
                <select name="year_id" id="year_id" class="form-control">
                    @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
