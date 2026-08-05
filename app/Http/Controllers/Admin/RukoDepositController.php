<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RukoDeposit;
use Illuminate\Http\Request;

class RukoDepositController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->query('year', date('Y'));
        
        $deposits = RukoDeposit::where('year', $year)
                               ->orderBy('ruko_no')
                               ->get();
                               
        return view('admin.ruko-deposits.index', compact('deposits', 'year'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'name' => 'required|string|max:255',
            'ruko_no' => 'required|string|max:255',
            'january' => 'nullable|numeric',
            'february' => 'nullable|numeric',
            'march' => 'nullable|numeric',
            'april' => 'nullable|numeric',
            'may' => 'nullable|numeric',
            'june' => 'nullable|numeric',
            'july' => 'nullable|numeric',
            'august' => 'nullable|numeric',
            'september' => 'nullable|numeric',
            'october' => 'nullable|numeric',
            'november' => 'nullable|numeric',
            'december' => 'nullable|numeric',
            'deposit_count' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        RukoDeposit::updateOrCreate(
            [
                'year' => $request->year,
                'ruko_no' => $request->ruko_no
            ],
            [
                'name' => $request->name,
                'january' => $request->january ?? 0,
                'february' => $request->february ?? 0,
                'march' => $request->march ?? 0,
                'april' => $request->april ?? 0,
                'may' => $request->may ?? 0,
                'june' => $request->june ?? 0,
                'july' => $request->july ?? 0,
                'august' => $request->august ?? 0,
                'september' => $request->september ?? 0,
                'october' => $request->october ?? 0,
                'november' => $request->november ?? 0,
                'december' => $request->december ?? 0,
                'deposit_count' => $request->deposit_count ?? 0,
                'notes' => $request->notes,
            ]
        );

        return redirect()->route('admin.ruko-financial-reports.index', ['year' => $request->year])->with('success', 'Data Setoran Ruko berhasil disimpan!')->withFragment('setoran');
    }

    public function destroy(RukoDeposit $rukoDeposit)
    {
        $year = $rukoDeposit->year;
        $rukoDeposit->delete();
        return redirect()->route('admin.ruko-financial-reports.index', ['year' => $year])->with('success', 'Data Setoran Ruko berhasil dihapus!')->withFragment('setoran');
    }
}
