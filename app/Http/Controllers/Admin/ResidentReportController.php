<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResidentReport;
use Illuminate\Http\Request;

class ResidentReportController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $reports = ResidentReport::when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20);
        return view('admin.reports.index', compact('reports', 'status'));
    }

    public function show(ResidentReport $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    public function update(Request $request, ResidentReport $report)
    {
        $data = $request->validate([
            'status'   => 'required|in:pending,proses,selesai',
            'response' => 'nullable|string',
        ]);
        $report->update($data);
        return redirect()->route('admin.reports.index')->with('success', 'Status pengaduan diperbarui.');
    }

    public function destroy(ResidentReport $report)
    {
        $report->delete();
        return redirect()->route('admin.reports.index')->with('success', 'Pengaduan dihapus.');
    }
}
