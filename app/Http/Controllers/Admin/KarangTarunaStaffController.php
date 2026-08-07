<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KarangTarunaStaff;
use Illuminate\Http\Request;

class KarangTarunaStaffController extends Controller
{
    public function index()
    {
        $staffs = KarangTarunaStaff::orderBy('sort_order')->get();
        return view('admin.karang-taruna-staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.karang-taruna-staff.create');
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
            $data['image'] = $request->file('image')->store('karang-taruna', 'public');
        }
        
        $data['sort_order'] = $data['sort_order'] ?? 0;
        KarangTarunaStaff::create($data);
        
        return redirect()->route('admin.karang-taruna-staff.index')->with('success', 'Pengurus Karang Taruna berhasil ditambahkan.');
    }

    public function edit(KarangTarunaStaff $karang_taruna_staff)
    {
        return view('admin.karang-taruna-staff.edit', compact('karang_taruna_staff'));
    }

    public function update(Request $request, KarangTarunaStaff $karang_taruna_staff)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'image'      => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        
        if ($request->hasFile('image')) {
            if ($karang_taruna_staff->image) \Storage::disk('public')->delete($karang_taruna_staff->image);
            $data['image'] = $request->file('image')->store('karang-taruna', 'public');
        }
        
        $karang_taruna_staff->update($data);
        
        return redirect()->route('admin.karang-taruna-staff.index')->with('success', 'Pengurus Karang Taruna berhasil diperbarui.');
    }

    public function destroy(KarangTarunaStaff $karang_taruna_staff)
    {
        if ($karang_taruna_staff->image) \Storage::disk('public')->delete($karang_taruna_staff->image);
        $karang_taruna_staff->delete();
        
        return redirect()->route('admin.karang-taruna-staff.index')->with('success', 'Pengurus Karang Taruna berhasil dihapus.');
    }
}
