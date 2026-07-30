<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IuranInfo;

class IuranInfoController extends Controller
{
    public function index()
    {
        $iurans = IuranInfo::orderBy('sort_order')->get();
        return view('admin.iuran.index', compact('iurans'));
    }

    public function create()
    {
        return view('admin.iuran.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'amount'      => 'nullable|numeric',
            'is_active'   => 'nullable|boolean',
            'sort_order'  => 'nullable|integer|min:0',
        ]);
        
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        IuranInfo::create($data);
        return redirect()->route('admin.iuran.index')->with('success', 'Informasi Iuran ditambahkan.');
    }

    public function edit(IuranInfo $iuran)
    {
        return view('admin.iuran.edit', compact('iuran'));
    }

    public function update(Request $request, IuranInfo $iuran)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'amount'      => 'nullable|numeric',
            'is_active'   => 'nullable|boolean',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $iuran->update($data);
        return redirect()->route('admin.iuran.index')->with('success', 'Informasi Iuran diperbarui.');
    }

    public function destroy(IuranInfo $iuran)
    {
        $iuran->delete();
        return redirect()->route('admin.iuran.index')->with('success', 'Informasi Iuran dihapus.');
    }
}
