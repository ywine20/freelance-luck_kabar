<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Series;
use App\Models\CarModel;
use App\Models\Year;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('backend.cars.index', compact('cars'));
    }

    public function create()
    {
        $brands = Brand::all();
        $companies = Company::all();
        $series = Series::all();
        $models = CarModel::all();
        $years = Year::all();

        return view('backend.cars.create', compact('brands', 'companies', 'series', 'models', 'years'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'company_id' => 'required|exists:companies,id',
            'series_id' => 'required|exists:series,id',
            'model_id' => 'required|exists:car_models,id',
            'year_id' => 'required|exists:years,id',
            'description' => 'required|string',
        ]);
    
        Car::create($request->all());
    
        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully.');
    }

    public function edit(Car $car)
    {
        $brands = Brand::all();
        $companies = Company::all();
        $series = Series::all();
        $models = CarModel::all();
        $years = Year::all();

        return view('backend.cars.edit', compact('car', 'brands', 'companies', 'series', 'models', 'years'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'company_id' => 'required|exists:companies,id',
            'series_id' => 'required|exists:series,id',
            'model_id' => 'required|exists:car_models,id',
            'year_id' => 'required|exists:years,id',
            'description' => 'required|string',
        ]);

        $car->update($request->all());

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
