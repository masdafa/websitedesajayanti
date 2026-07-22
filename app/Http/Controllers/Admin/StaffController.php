<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $query = Staff::orderBy('order');
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('position', 'like', '%' . $request->search . '%');
        }
        $staff = $query->paginate(10)->withQueryString();
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image'    => 'nullable|image|max:2048',
            'order'    => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('staff', 'public');
        }
        $data['order'] = $data['order'] ?? 0;

        Staff::create($data);
        return redirect()->route('admin.staff.index')->with('success', 'Perangkat desa berhasil ditambahkan.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image'    => 'nullable|image|max:2048',
            'order'    => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($staff->image) {
                \Storage::disk('public')->delete($staff->image);
            }
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        $staff->update($data);
        return redirect()->route('admin.staff.index')->with('success', 'Perangkat desa berhasil diperbarui.');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->image) {
            \Storage::disk('public')->delete($staff->image);
        }
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Perangkat desa berhasil dihapus.');
    }
}
