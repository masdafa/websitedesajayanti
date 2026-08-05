<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::orderBy('sort_order')->get();
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'icon'        => 'required|string',
            'images'      => 'nullable|array|max:10',
            'images.*'    => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('facilities', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        Facility::create($data);
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'icon'        => 'required|string',
            'images'      => 'nullable|array|max:10',
            'images.*'    => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('images')) {
            if (!empty($facility->images)) {
                foreach ($facility->images as $img) {
                    if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('facilities', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $facility->update($data);
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        if (!empty($facility->images)) {
            foreach ($facility->images as $img) {
                if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
            }
        }
        $facility->delete();
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
