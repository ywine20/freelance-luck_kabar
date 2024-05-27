<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\Company;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function index()
    {
        $carModels = CarModel::with('company')->get();
        return view('backend.car_models.index', compact('carModels'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('backend.car_models.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
        ]);

        CarModel::create($request->all());

        return redirect()->route('admin.car_models.index')->with('success', 'Car model created successfully.');
    }

    public function edit(CarModel $carModel)
    {
        $companies = Company::all();
        return view('backend.car_models.edit', compact('carModel', 'companies'));
    }

    public function update(Request $request, CarModel $carModel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
        ]);

        $carModel->update($request->all());

        return redirect()->route('admin.car_models.index')->with('success', 'Car model updated successfully.');
    }

    public function destroy(CarModel $carModel)
    {
        $carModel->delete();
        return redirect()->route('admin.car_models.index')->with('success', 'Car model deleted successfully.');
    }
}
