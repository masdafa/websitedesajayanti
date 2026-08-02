<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZiswafReport;
use Illuminate\Http\Request;

class ZiswafReportController extends Controller
{
    public function index()
    {
        $reports = ZiswafReport::latest()->get();
        return view('admin.ziswaf_reports.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.ziswaf_reports.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'month_name' => 'required|string|max:255',
            'income' => 'required|numeric|min:0',
            'expense' => 'required|numeric|min:0',
            'balance' => 'required|numeric|min:0',
        ]);

        ZiswafReport::create($data);

        return redirect()->route('admin.ziswaf-reports.index')->with('success', 'Laporan ZISWAF berhasil ditambahkan.');
    }

    public function edit(ZiswafReport $ziswafReport)
    {
        return view('admin.ziswaf_reports.edit', compact('ziswafReport'));
    }

    public function update(Request $request, ZiswafReport $ziswafReport)
    {
        $data = $request->validate([
            'month_name' => 'required|string|max:255',
            'income' => 'required|numeric|min:0',
            'expense' => 'required|numeric|min:0',
            'balance' => 'required|numeric|min:0',
        ]);

        $ziswafReport->update($data);

        return redirect()->route('admin.ziswaf-reports.index')->with('success', 'Laporan ZISWAF berhasil diperbarui.');
    }

    public function destroy(ZiswafReport $ziswafReport)
    {
        $ziswafReport->delete();
        return redirect()->route('admin.ziswaf-reports.index')->with('success', 'Laporan ZISWAF berhasil dihapus.');
    }
}
