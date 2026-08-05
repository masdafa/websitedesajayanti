<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::orderByRaw('COALESCE(published_date, created_at) desc');
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $galleries = $query->paginate(12)->withQueryString();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:500',
            'images'         => 'required|array|max:10|min:1',
            'images.*'       => 'image|mimes:jpeg,png,jpg,webp|max:3072',
            'published_date' => 'nullable|date',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('gallery', 'public');
            }
        }
        $data['images'] = $imagePaths;
        if (empty($data['published_date'])) {
            $data['published_date'] = now();
        }

        Gallery::create($data);
        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:500',
            'images'         => 'nullable|array|max:10',
            'images.*'       => 'image|mimes:jpeg,png,jpg,webp|max:3072',
            'published_date' => 'nullable|date',
        ]);

        if ($request->hasFile('images')) {
            if (!empty($gallery->images)) {
                foreach ($gallery->images as $img) {
                    if (\Storage::disk('public')->exists($img)) \Storage::disk('public')->delete($img);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('gallery', 'public');
            }
            $data['images'] = $imagePaths;
        }
        
        if (empty($data['published_date'])) {
            $data['published_date'] = $gallery->created_at;
        }

        $gallery->update($data);
        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if (!empty($gallery->images)) {
            foreach ($gallery->images as $img) {
                if (\Storage::disk('public')->exists($img)) \Storage::disk('public')->delete($img);
            }
        }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
