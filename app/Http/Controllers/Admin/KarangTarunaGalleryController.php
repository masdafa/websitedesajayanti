<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KarangTarunaGallery;
use Illuminate\Support\Facades\Storage;

class KarangTarunaGalleryController extends Controller
{
    public function index()
    {
        $galleries = KarangTarunaGallery::latest()->get();
        return view('admin.karang-taruna-galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.karang-taruna-galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_date' => 'nullable|date',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('karang-taruna/galleries', 'public');
            }
        }

        KarangTarunaGallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'published_date' => $request->published_date ?? now(),
            'images' => $imagePaths
        ]);

        return redirect()->route('admin.karang-taruna-galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(KarangTarunaGallery $karang_taruna_gallery)
    {
        return view('admin.karang-taruna-galleries.edit', compact('karang_taruna_gallery'));
    }

    public function update(Request $request, KarangTarunaGallery $karang_taruna_gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_date' => 'nullable|date',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $imagePaths = $karang_taruna_gallery->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('karang-taruna/galleries', 'public');
            }
        }

        $karang_taruna_gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'published_date' => $request->published_date,
            'images' => $imagePaths
        ]);

        return redirect()->route('admin.karang-taruna-galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(KarangTarunaGallery $karang_taruna_gallery)
    {
        if (!empty($karang_taruna_gallery->images)) {
            foreach ($karang_taruna_gallery->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $karang_taruna_gallery->delete();
        
        return redirect()->route('admin.karang-taruna-galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function deleteImage(Request $request, KarangTarunaGallery $karang_taruna_gallery)
    {
        $imagePath = $request->image;
        $images = $karang_taruna_gallery->images;

        if (($key = array_search($imagePath, $images)) !== false) {
            unset($images[$key]);
            Storage::disk('public')->delete($imagePath);
            $karang_taruna_gallery->images = array_values($images);
            $karang_taruna_gallery->save();
        }

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
