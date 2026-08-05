<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DkmGallery;
use Illuminate\Support\Facades\Storage;

class DkmGalleryController extends Controller
{
    public function index()
    {
        $galleries = DkmGallery::latest()->get();
        return view('admin.dkm-galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.dkm-galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'required|array|max:10|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
            'published_date' => 'nullable|date',
        ]);

        $data = $request->except(['images']);
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('dkm_galleries', 'public');
            }
            $data['images'] = $imagePaths;
        }

        DkmGallery::create($data);

        return redirect()->route('admin.dkm-galleries.index')->with('success', 'Dokumentasi DKM berhasil ditambahkan.');
    }

    public function edit(DkmGallery $dkm_gallery)
    {
        return view('admin.dkm-galleries.edit', compact('dkm_gallery'));
    }

    public function update(Request $request, DkmGallery $dkm_gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'nullable|array|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
            'published_date' => 'nullable|date',
        ]);

        $data = $request->except(['images']);

        if ($request->hasFile('images')) {
            if (!empty($dkm_gallery->images)) {
                foreach ($dkm_gallery->images as $img) {
                    if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('dkm_galleries', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $dkm_gallery->update($data);

        return redirect()->route('admin.dkm-galleries.index')->with('success', 'Dokumentasi DKM berhasil diperbarui.');
    }

    public function destroy(DkmGallery $dkm_gallery)
    {
        if (!empty($dkm_gallery->images)) {
            foreach ($dkm_gallery->images as $img) {
                if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
            }
        }
        $dkm_gallery->delete();

        return redirect()->route('admin.dkm-galleries.index')->with('success', 'Dokumentasi DKM berhasil dihapus.');
    }
}
