<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DkmActivity;
use Illuminate\Http\Request;

class DkmActivityController extends Controller
{
    public function index()
    {
        $activities = DkmActivity::latest()->get();
        return view('admin.dkm_activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.dkm_activities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        DkmActivity::create($data);

        return redirect()->route('admin.dkm-activities.index')->with('success', 'Kegiatan DKM berhasil ditambahkan.');
    }

    public function edit(DkmActivity $dkmActivity)
    {
        return view('admin.dkm_activities.edit', compact('dkmActivity'));
    }

    public function update(Request $request, DkmActivity $dkmActivity)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $dkmActivity->update($data);

        return redirect()->route('admin.dkm-activities.index')->with('success', 'Kegiatan DKM berhasil diperbarui.');
    }

    public function destroy(DkmActivity $dkmActivity)
    {
        $dkmActivity->delete();
        return redirect()->route('admin.dkm-activities.index')->with('success', 'Kegiatan DKM berhasil dihapus.');
    }
}
