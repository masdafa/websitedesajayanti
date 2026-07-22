<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infographic;
use Illuminate\Http\Request;

class InfographicController extends Controller
{
    public function index(Request $request)
    {
        $query = Infographic::latest();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }
        $infographics = $query->paginate(10)->withQueryString();
        return view('admin.infographics.index', compact('infographics'));
    }

    public function create()
    {
        return view('admin.infographics.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'image'       => 'required|image|max:3072',
            'description' => 'nullable|string',
        ]);

        $data['image'] = $request->file('image')->store('infographics', 'public');

        Infographic::create($data);
        return redirect()->route('admin.infographics.index')->with('success', 'Infografis berhasil ditambahkan.');
    }

    public function edit(Infographic $infographic)
    {
        return view('admin.infographics.edit', compact('infographic'));
    }

    public function update(Request $request, Infographic $infographic)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'image'       => 'nullable|image|max:3072',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($infographic->image) {
                \Storage::disk('public')->delete($infographic->image);
            }
            $data['image'] = $request->file('image')->store('infographics', 'public');
        }

        $infographic->update($data);
        return redirect()->route('admin.infographics.index')->with('success', 'Infografis berhasil diperbarui.');
    }

    public function destroy(Infographic $infographic)
    {
        if ($infographic->image) {
            \Storage::disk('public')->delete($infographic->image);
        }
        $infographic->delete();
        return redirect()->route('admin.infographics.index')->with('success', 'Infografis berhasil dihapus.');
    }
}
