<?php

namespace App\Http\Controllers\Backend;

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SecondCategory;
use Illuminate\Http\Request;

class SecondCategoryController extends Controller
{
    public function index()
    {
        $secondCategories = SecondCategory::all();
        return view('backend.second_categories.index', compact('secondCategories'));
    }

    public function create()
    {
        return view('backend.second_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        SecondCategory::create($request->all());

        return redirect()->route('admin.second_categories.index')->with('success', 'Second Category created successfully.');
    }

    public function edit(SecondCategory $secondCategory)
    {
        return view('backend.second_categories.edit', compact('secondCategory'));
    }

    public function update(Request $request, SecondCategory $secondCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $secondCategory->update($request->all());
        return redirect()->route('admin.second_categories.index')->with('success', 'Second Category updated successfully.');
    }

    public function destroy(SecondCategory $secondCategory)
    {
        $secondCategory->delete();
        return redirect()->route('admin.second_categories.index')->with('success', 'Second Category deleted successfully.');
    }
}
