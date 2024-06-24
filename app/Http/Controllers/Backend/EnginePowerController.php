<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EnginePower;
use Illuminate\Http\Request;

class EnginePowerController extends Controller
{
    public function index()
    {
        $enginePowers = EnginePower::all();
        return view('backend.engine_powers.index', compact('enginePowers'));
    }

    public function create()
    {
        return view('backend.engine_powers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'enginepower' => 'required|numeric',
        ]);

        EnginePower::create($request->all());

        return redirect()->route('admin.engine_powers.index')->with('success', 'Engine Power created successfully.');
    }

    public function edit(EnginePower $enginePower)
    {
        return view('backend.engine_powers.edit', compact('enginePower'));
    }

    public function update(Request $request, EnginePower $enginePower)
    {
        $request->validate([
            'enginepower' => 'required|numeric',
        ]);

        $enginePower->update($request->all());

        return redirect()->route('admin.engine_powers.index')->with('success', 'Engine Power updated successfully.');
    }

    public function destroy(EnginePower $enginePower)
    {
        $enginePower->delete();

        return redirect()->route('admin.engine_powers.index')->with('success', 'Engine Power deleted successfully.');
    }
}
