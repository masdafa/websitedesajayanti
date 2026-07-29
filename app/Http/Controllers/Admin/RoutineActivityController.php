<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoutineActivity;
use Illuminate\Http\Request;

class RoutineActivityController extends Controller
{
    public function index()
    {
        $activities = RoutineActivity::orderBy('sort_order')->get();
        return view('admin.routine_activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.routine_activities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'icon'       => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        RoutineActivity::create($data);
        return redirect()->route('admin.routine-activities.index')->with('success', 'Kegiatan rutin berhasil ditambahkan.');
    }

    public function edit(RoutineActivity $routineActivity)
    {
        return view('admin.routine_activities.edit', compact('routineActivity'));
    }

    public function update(Request $request, RoutineActivity $routineActivity)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'icon'       => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $routineActivity->update($data);
        return redirect()->route('admin.routine-activities.index')->with('success', 'Kegiatan rutin berhasil diperbarui.');
    }

    public function destroy(RoutineActivity $routineActivity)
    {
        $routineActivity->delete();
        return redirect()->route('admin.routine-activities.index')->with('success', 'Kegiatan rutin berhasil dihapus.');
    }
}
