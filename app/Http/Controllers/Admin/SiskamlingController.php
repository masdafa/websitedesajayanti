<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siskamling;
use Illuminate\Http\Request;

class SiskamlingController extends Controller
{
    public function index()
    {
        $siskamlings = Siskamling::orderBy('sort_order')->get();
        return view('admin.siskamling.index', compact('siskamlings'));
    }

    public function create()
    {
        return view('admin.siskamling.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'day'        => 'required|string|max:50',
            'members'    => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        Siskamling::create($data);
        return redirect()->route('admin.siskamling.index')->with('success', 'Jadwal siskamling berhasil ditambahkan.');
    }

    public function edit(Siskamling $siskamling)
    {
        return view('admin.siskamling.edit', compact('siskamling'));
    }

    public function update(Request $request, Siskamling $siskamling)
    {
        $data = $request->validate([
            'day'        => 'required|string|max:50',
            'members'    => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $siskamling->update($data);
        return redirect()->route('admin.siskamling.index')->with('success', 'Jadwal siskamling berhasil diperbarui.');
    }

    public function destroy(Siskamling $siskamling)
    {
        $siskamling->delete();
        return redirect()->route('admin.siskamling.index')->with('success', 'Jadwal siskamling berhasil dihapus.');
    }
}
