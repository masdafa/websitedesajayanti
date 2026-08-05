<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\K3Deposit;
use Illuminate\Http\Request;

class K3DepositController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $reports = K3Deposit::where('year', $year)->get();
            
        $months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        $reports = $reports->sortBy(function($report) use ($months) {
            return array_search($report->month, $months);
        });

        return view('admin.k3-deposits.index', compact('reports', 'year', 'months'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|string',
            'year' => 'required|integer',
            'rt_23' => 'required|numeric',
            'rt_24' => 'required|numeric',
            'rt_25' => 'required|numeric',
        ]);

        $jumlah = $request->rt_23 + $request->rt_24 + $request->rt_25;

        K3Deposit::updateOrCreate(
            ['month' => $request->month, 'year' => $request->year],
            [
                'rt_23' => $request->rt_23,
                'rt_24' => $request->rt_24,
                'rt_25' => $request->rt_25,
                'jumlah' => $jumlah,
            ]
        );

        return redirect()->route('admin.k3-deposits.index', ['year' => $request->year])
            ->with('success', 'Data Setoran K3 berhasil disimpan.');
    }

    public function destroy(K3Deposit $k3_deposit)
    {
        $year = $k3_deposit->year;
        $k3_deposit->delete();

        return redirect()->route('admin.k3-deposits.index', ['year' => $year])
            ->with('success', 'Data Setoran berhasil dihapus.');
    }
}
