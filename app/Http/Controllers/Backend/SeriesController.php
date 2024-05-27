<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        return view('backend.series.index', compact('series'));
    }

    public function create()
    {
        return view('backend.series.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Series::create($request->all());
        return redirect()->route('admin.series.index')->with('success', 'Series created successfully.');
    }

    public function edit(Series $series)
    {
        return view('backend.series.edit', compact('series'));
    }

    public function update(Request $request, Series $series)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $series->update($request->all());
        return redirect()->route('admin.series.index')->with('success', 'Series updated successfully.');
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return redirect()->route('admin.series.index')->with('success', 'Series deleted successfully.');
    }
}