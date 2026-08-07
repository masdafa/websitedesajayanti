<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KarangTarunaActivity;

class KarangTarunaActivityController extends Controller
{
    public function index()
    {
        $activities = KarangTarunaActivity::latest()->get();
        return view('admin.karang-taruna-activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.karang-taruna-activities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('karang-taruna', 'public');
        }

        KarangTarunaActivity::create($data);

        return redirect()->route('admin.karang-taruna-activities.index')->with('success', 'Kegiatan Karang Taruna berhasil ditambahkan.');
    }

    public function edit(KarangTarunaActivity $karang_taruna_activity)
    {
        return view('admin.karang-taruna-activities.edit', compact('karang_taruna_activity'));
    }

    public function update(Request $request, KarangTarunaActivity $karang_taruna_activity)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($karang_taruna_activity->image) \Storage::disk('public')->delete($karang_taruna_activity->image);
            $data['image'] = $request->file('image')->store('karang-taruna', 'public');
        }

        $karang_taruna_activity->update($data);

        return redirect()->route('admin.karang-taruna-activities.index')->with('success', 'Kegiatan Karang Taruna berhasil diperbarui.');
    }

    public function destroy(KarangTarunaActivity $karang_taruna_activity)
    {
        if ($karang_taruna_activity->image) \Storage::disk('public')->delete($karang_taruna_activity->image);
        $karang_taruna_activity->delete();
        
        return redirect()->route('admin.karang-taruna-activities.index')->with('success', 'Kegiatan Karang Taruna berhasil dihapus.');
    }
}
