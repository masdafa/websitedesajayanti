<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RukoFinancialReport;
use Illuminate\Http\Request;

class RukoFinancialReportController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $reports = RukoFinancialReport::where('year', $year)->get();
            
        // Pre-defined months for form
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $reports = $reports->sortBy(function($report) use ($months) {
            return array_search($report->month, $months);
        });

        return view('admin.ruko-financial-reports.index', compact('reports', 'year', 'months'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|string',
            'year' => 'required|integer',
            'income' => 'required|numeric',
            'expense' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        RukoFinancialReport::updateOrCreate(
            ['month' => $request->month, 'year' => $request->year],
            [
                'income' => $request->income,
                'expense' => $request->expense,
                'balance' => $request->balance,
            ]
        );

        return redirect()->route('admin.ruko-financial-reports.index', ['year' => $request->year])
            ->with('success', 'Laporan Keuangan Ruko berhasil disimpan.');
    }

    public function destroy(RukoFinancialReport $rukoFinancialReport)
    {
        $year = $rukoFinancialReport->year;
        $rukoFinancialReport->delete();

        return redirect()->route('admin.ruko-financial-reports.index', ['year' => $year])
            ->with('success', 'Data Laporan Ruko berhasil dihapus.');
    }
}
