<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\SecondCategory;
use App\Models\MainCategory;
use App\Models\Car;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['secondCategory', 'mainCategory', 'cars'])->get();
        return view('backend.items.index', compact('items'));
    }

    public function create()
    {
        $secondCategories = SecondCategory::all();
        $mainCategories = MainCategory::all();
        $cars = Car::all();
        return view('backend.items.create', compact('secondCategories', 'mainCategories', 'cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'second_category_id' => 'required|exists:second_categories,id',
            'main_category_id' => 'required|exists:main_categories,id',
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'is_feature' => 'required|boolean',
            'OE_No' => 'required|string|max:255',
            'price' => 'required|numeric',
            'cars' => 'array|exists:cars,id',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/items'), $imageName);

        $data = $request->all();
        $data['image'] = 'images/items/' . $imageName;

        $item = Item::create($data);
        $item->cars()->sync($request->cars);

        return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
    }

    public function edit(Item $item)
    {
        $secondCategories = SecondCategory::all();
        $mainCategories = MainCategory::all();
        $cars = Car::all();
        return view('backend.items.edit', compact('item', 'secondCategories', 'mainCategories', 'cars'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'second_category_id' => 'required|exists:second_categories,id',
            'main_category_id' => 'required|exists:main_categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_feature' => 'required|boolean',
            'OE_No' => 'required|string|max:255',
            'price' => 'required|numeric',
            'cars' => 'array|exists:cars,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/items'), $imageName);
            $data['image'] = 'images/items/' . $imageName;
        }

        $item->update($data);
        $item->cars()->sync($request->cars);

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully.');
    }
}
