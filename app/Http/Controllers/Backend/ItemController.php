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
        $items = Item::with(['secondCategory', 'mainCategory', 'cars', 'images'])->get();
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
            'brandName' => 'required|string|max:255',
            'images' => 'required|array',
            'images.*' => 'image|max:2048',
            'is_feature' => 'required|boolean',
            'OE_No' => 'required|string|max:255|unique:items,OE_No',
            'price' => 'required|numeric',
            'cars' => 'array|exists:cars,id',
        ]);

        $data = $request->all();
        $item = Item::create($data);
        $item->cars()->sync($request->cars);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images/items'), $imageName);
                $item->images()->create(['path' => 'images/items/' . $imageName]);
            }
        }

        return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
    }

    public function edit(Item $item)
    {
        $secondCategories = SecondCategory::all();
        $mainCategories = MainCategory::all();
        $cars = Car::all();
        return view('backend.items.edit', compact('item', 'secondCategories', 'mainCategories', 'cars'));
    }

   // ItemController.php

   public function update(Request $request, Item $item)
   {
       $request->validate([
           'second_category_id' => 'required|exists:second_categories,id',
           'main_category_id' => 'required|exists:main_categories,id',
           'name' => 'required|string|max:255',
           'brandName' => 'required|string|max:255',
           'images' => 'nullable|array',
           'images.*' => 'image|max:2048',
           'is_feature' => 'required|boolean',
           'OE_No' => 'required|string|max:255|unique:items,OE_No,' . $item->id,
           'price' => 'required|numeric',
           'cars' => 'array|exists:cars,id',
       ]);
   
       $data = $request->all();
       $item->update($data);
       $item->cars()->sync($request->cars);
   
       // Delete images
       if ($request->has('delete_images')) {
           foreach ($request->delete_images as $imageId) {
               $image = $item->images()->find($imageId);
               if ($image) {
                   if (Storage::disk('public')->exists($image->path)) {
                       Storage::disk('public')->delete($image->path);
                   }
                   $image->delete();
               }
           }
       }
   
       // Handle new images
       if ($request->hasFile('images')) {
           $this->handleImageUploads($request, $item);
       }
   
       return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
   }
   

private function handleImageUploads(Request $request, Item $item)
{
    foreach ($request->file('images') as $image) {
        $imageName = time() . '-' . uniqid() . '.' . $image->extension();
        $image->move(public_path('images/items'), $imageName);
        $item->images()->create(['path' => 'images/items/' . $imageName]);
    }
}


    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully.');
    }
}
