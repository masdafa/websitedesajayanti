<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PosyanduGallery;
use Illuminate\Support\Facades\Storage;

class PosyanduGalleryController extends Controller
{
    public function index()
    {
        $galleries = PosyanduGallery::latest()->get();
        return view('admin.posyandu-galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.posyandu-galleries.create');
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
                $imagePaths[] = $image->store('posyandu_galleries', 'public');
            }
            $data['images'] = $imagePaths;
        }

        PosyanduGallery::create($data);

        return redirect()->route('admin.posyandu-galleries.index')->with('success', 'Dokumentasi Posyandu berhasil ditambahkan.');
    }

    public function edit(PosyanduGallery $posyandu_gallery)
    {
        return view('admin.posyandu-galleries.edit', compact('posyandu_gallery'));
    }

    public function update(Request $request, PosyanduGallery $posyandu_gallery)
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
            if (!empty($posyandu_gallery->images)) {
                foreach ($posyandu_gallery->images as $img) {
                    if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('posyandu_galleries', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $posyandu_gallery->update($data);

        return redirect()->route('admin.posyandu-galleries.index')->with('success', 'Dokumentasi Posyandu berhasil diperbarui.');
    }

    public function destroy(PosyanduGallery $posyandu_gallery)
    {
        if (!empty($posyandu_gallery->images)) {
            foreach ($posyandu_gallery->images as $img) {
                if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
            }
        }
        $posyandu_gallery->delete();

        return redirect()->route('admin.posyandu-galleries.index')->with('success', 'Dokumentasi Posyandu berhasil dihapus.');
    }
}
