<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::latest();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }
        $listings = $query->paginate(10)->withQueryString();
        return view('admin.listings.index', compact('listings'));
    }

    public function create()
    {
        return view('admin.listings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'nullable|string|max:100',
            'address'      => 'nullable|string',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
            'phone_number' => 'nullable|string|max:20',
            'maps_url'     => 'nullable|url|max:500',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('listings', 'public');
        }

        Listing::create($data);
        return redirect()->route('admin.listings.index')->with('success', 'Listing berhasil ditambahkan.');
    }

    public function edit(Listing $listing)
    {
        return view('admin.listings.edit', compact('listing'));
    }

    public function update(Request $request, Listing $listing)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'nullable|string|max:100',
            'address'      => 'nullable|string',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
            'phone_number' => 'nullable|string|max:20',
            'maps_url'     => 'nullable|url|max:500',
        ]);

        if ($request->hasFile('image')) {
            if ($listing->image) {
                \Storage::disk('public')->delete($listing->image);
            }
            $data['image'] = $request->file('image')->store('listings', 'public');
        }

        $listing->update($data);
        return redirect()->route('admin.listings.index')->with('success', 'Listing berhasil diperbarui.');
    }

    public function destroy(Listing $listing)
    {
        if ($listing->image) {
            \Storage::disk('public')->delete($listing->image);
        }
        $listing->delete();
        return redirect()->route('admin.listings.index')->with('success', 'Listing berhasil dihapus.');
    }
}
