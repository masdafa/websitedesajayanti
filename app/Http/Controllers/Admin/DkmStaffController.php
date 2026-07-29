<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DkmStaff;
use Illuminate\Http\Request;

class DkmStaffController extends Controller
{
    public function index()
    {
        $staffs = DkmStaff::orderBy('sort_order')->get();
        return view('admin.dkm_staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.dkm_staff.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'image'      => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('dkm', 'public');
        }
        $data['sort_order'] = $data['sort_order'] ?? 0;
        DkmStaff::create($data);
        return redirect()->route('admin.dkm-staff.index')->with('success', 'Pengurus DKM berhasil ditambahkan.');
    }

    public function edit(DkmStaff $dkmStaff)
    {
        return view('admin.dkm_staff.edit', compact('dkmStaff'));
    }

    public function update(Request $request, DkmStaff $dkmStaff)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'image'      => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        if ($request->hasFile('image')) {
            if ($dkmStaff->image) \Storage::disk('public')->delete($dkmStaff->image);
            $data['image'] = $request->file('image')->store('dkm', 'public');
        }
        $dkmStaff->update($data);
        return redirect()->route('admin.dkm-staff.index')->with('success', 'Pengurus DKM berhasil diperbarui.');
    }

    public function destroy(DkmStaff $dkmStaff)
    {
        if ($dkmStaff->image) \Storage::disk('public')->delete($dkmStaff->image);
        $dkmStaff->delete();
        return redirect()->route('admin.dkm-staff.index')->with('success', 'Pengurus DKM berhasil dihapus.');
    }
}
