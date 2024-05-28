<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('backend.items.index', compact('items'));
    }

    public function create()
    {
        return view('backend.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'second_category_id' => 'required|exists:second_categories,id',
            'company_id' => 'required|exists:companies,id',
            'series_id' => 'required|exists:series,id',
            'model_id' => 'required|exists:car_models,id',
            'year_id' => 'required|exists:years,id',
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_feature' => 'required|boolean',
            'OE_No' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/items'), $imageName);

        Item::create([
            'brand_id' => $request->brand_id,
            'second_category_id' => $request->second_category_id,
            'company_id' => $request->company_id,
            'series_id' => $request->series_id,
            'model_id' => $request->model_id,
            'year_id' => $request->year_id,
            'name' => $request->name,
            'image' => $imageName,
            'is_feature' => $request->is_feature,
            'OE_No' => $request->OE_No,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
    }
}
