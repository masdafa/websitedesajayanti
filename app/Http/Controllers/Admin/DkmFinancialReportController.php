<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DkmFinancialReport;
use Illuminate\Http\Request;

class DkmFinancialReportController extends Controller
{
    public function index()
    {
        $reports = DkmFinancialReport::orderBy('year', 'desc')->orderBy('month', 'desc')->get();
        return view('admin.dkm_financial_reports.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.dkm_financial_reports.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer',
            'income' => 'required|numeric|min:0',
            'expense' => 'required|numeric|min:0',
            'balance' => 'required|numeric|min:0',
        ]);

        DkmFinancialReport::create($data);

        return redirect()->route('admin.dkm-financial-reports.index')->with('success', 'Laporan Keuangan DKM berhasil ditambahkan.');
    }

    public function edit(DkmFinancialReport $dkmFinancialReport)
    {
        return view('admin.dkm_financial_reports.edit', compact('dkmFinancialReport'));
    }

    public function update(Request $request, DkmFinancialReport $dkmFinancialReport)
    {
        $data = $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer',
            'income' => 'required|numeric|min:0',
            'expense' => 'required|numeric|min:0',
            'balance' => 'required|numeric|min:0',
        ]);

        $dkmFinancialReport->update($data);

        return redirect()->route('admin.dkm-financial-reports.index')->with('success', 'Laporan Keuangan DKM berhasil diperbarui.');
    }

    public function destroy(DkmFinancialReport $dkmFinancialReport)
    {
        $dkmFinancialReport->delete();
        return redirect()->route('admin.dkm-financial-reports.index')->with('success', 'Laporan Keuangan DKM berhasil dihapus.');
    }
}
