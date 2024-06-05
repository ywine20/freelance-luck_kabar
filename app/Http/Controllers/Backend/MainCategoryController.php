<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function index()
    {
        $mainCategories = MainCategory::all();
        return view('backend.main_categories.index', compact('mainCategories'));
    }

    public function create()
    {
        return view('backend.main_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        MainCategory::create($request->only('name'));

        return redirect()->route('admin.main_categories.index')->with('success', 'Main Category created successfully.');
    }

    public function edit(MainCategory $main_category)
    {
        return view('backend.main_categories.edit', compact('main_category'));
    }

    public function update(Request $request, MainCategory $main_category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $main_category->update($request->only('name'));
        return redirect()->route('admin.main_categories.index')->with('success', 'Main Category updated successfully.');
    }

    public function destroy(MainCategory $main_category)
    {
        $main_category->delete();
        return redirect()->route('admin.main_categories.index')->with('success', 'Main Category deleted successfully.');
    }
}
