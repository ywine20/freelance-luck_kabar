<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|string|max:255',
        ]);
    
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/sliders'), $imageName);
    
        Slider::create([
            'name' => $request->name,
            'image' => $imageName,
            'link' => $request->link,
        ]);
    
        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'link' => $request->link,
        ];

        if ($request->hasFile('image')) {
            Storage::delete('public/images/sliders/' . $slider->image);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/sliders'), $imageName);
            $data['image'] = $imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        // Delete the image from storage
        Storage::delete('public/images/sliders/' . $slider->image);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
