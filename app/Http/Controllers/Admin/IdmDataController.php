<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IdmData;
use Illuminate\Http\Request;

class IdmDataController extends Controller
{
    public function index(Request $request)
    {
        $query = IdmData::orderBy('year', 'desc');
        if ($request->filled('search')) {
            $query->where('year', 'like', '%' . $request->search . '%')
                  ->orWhere('status', 'like', '%' . $request->search . '%');
        }
        $idmData = $query->paginate(10)->withQueryString();
        return view('admin.idm.index', compact('idmData'));
    }

    public function create()
    {
        return view('admin.idm.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year'    => 'required|integer|min:2000|max:2100|unique:idm_data,year',
            'score'   => 'nullable|numeric|min:0|max:1',
            'status'  => 'nullable|string|max:100',
            'summary' => 'nullable|string',
        ]);

        IdmData::create($data);
        return redirect()->route('admin.idm.index')->with('success', 'Data IDM berhasil ditambahkan.');
    }

    public function edit(IdmData $idm)
    {
        return view('admin.idm.edit', compact('idm'));
    }

    public function update(Request $request, IdmData $idm)
    {
        $data = $request->validate([
            'year'    => 'required|integer|min:2000|max:2100|unique:idm_data,year,' . $idm->id,
            'score'   => 'nullable|numeric|min:0|max:1',
            'status'  => 'nullable|string|max:100',
            'summary' => 'nullable|string',
        ]);

        $idm->update($data);
        return redirect()->route('admin.idm.index')->with('success', 'Data IDM berhasil diperbarui.');
    }

    public function destroy(IdmData $idm)
    {
        $idm->delete();
        return redirect()->route('admin.idm.index')->with('success', 'Data IDM berhasil dihapus.');
    }
}
