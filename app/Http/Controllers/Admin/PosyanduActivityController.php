<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PosyanduActivity;

class PosyanduActivityController extends Controller
{
    public function index()
    {
        $activities = PosyanduActivity::latest()->get();
        return view('admin.posyandu-activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.posyandu-activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        PosyanduActivity::create($request->all());

        return redirect()->route('admin.posyandu-activities.index')->with('success', 'Kegiatan Posyandu berhasil ditambahkan.');
    }

    public function edit(PosyanduActivity $posyandu_activity)
    {
        return view('admin.posyandu-activities.edit', compact('posyandu_activity'));
    }

    public function update(Request $request, PosyanduActivity $posyandu_activity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $posyandu_activity->update($request->all());

        return redirect()->route('admin.posyandu-activities.index')->with('success', 'Kegiatan Posyandu berhasil diperbarui.');
    }

    public function destroy(PosyanduActivity $posyandu_activity)
    {
        $posyandu_activity->delete();
        return redirect()->route('admin.posyandu-activities.index')->with('success', 'Kegiatan Posyandu berhasil dihapus.');
    }
}
