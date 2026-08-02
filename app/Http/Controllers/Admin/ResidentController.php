<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Imports\ResidentImport;
use Maatwebsite\Excel\Facades\Excel;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::orderBy('id', 'desc')->get();
        return view('admin.residents.index', compact('residents'));
    }

    public function create()
    {
        return view('admin.residents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'nullable|string|max:255',
            'no_kk' => 'nullable|string|max:255',
            'blok_rumah' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:255',
            'status_warga' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        Resident::create($validated);
        return redirect()->route('admin.residents.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(Resident $resident)
    {
        return view('admin.residents.edit', compact('resident'));
    }

    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'nullable|string|max:255',
            'no_kk' => 'nullable|string|max:255',
            'blok_rumah' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:255',
            'status_warga' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        $resident->update($validated);
        return redirect()->route('admin.residents.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();
        return redirect()->route('admin.residents.index')->with('success', 'Data warga berhasil dihapus.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,csv,xls|max:5120',
        ]);

        try {
            Excel::import(new ResidentImport, $request->file('file_excel'));
            return redirect()->route('admin.residents.index')->with('success', 'Data warga berhasil diimpor.');
        } catch (\Exception $e) {
            return redirect()->route('admin.residents.index')->with('error', 'Gagal mengimpor data: Pastikan format header sesuai (nama_lengkap, dll). Error: ' . $e->getMessage());
        }
    }
}
