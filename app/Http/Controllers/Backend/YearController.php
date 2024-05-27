<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Year;
use App\Models\Series;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index()
    {
        $years = Year::all();
        return view('backend.years.index', compact('years'));
    }

    public function create()
    {
        $series = Series::all();
        return view('backend.years.create', compact('series'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'series_id' => 'required|exists:series,id',
            'year' => 'required|numeric',
        ]);

        Year::create([
            'series_id' => $request->series_id,
            'year' => $request->year,
        ]);

        return redirect()->route('admin.years.index')->with('success', 'Year created successfully.');
    }

    public function edit(Year $year)
    {
        $series = Series::all();
        return view('backend.years.edit', compact('year', 'series'));
    }

    public function update(Request $request, Year $year)
    {
        $request->validate([
            'series_id' => 'required|exists:series,id',
            'year' => 'required|numeric',
        ]);

        $year->update([
            'series_id' => $request->series_id,
            'year' => $request->year,
        ]);

        return redirect()->route('admin.years.index')->with('success', 'Year updated successfully.');
    }

    public function destroy(Year $year)
    {
        $year->delete();
        return redirect()->route('admin.years.index')->with('success', 'Year deleted successfully.');
    }
}
