<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\K3Budget;
use Illuminate\Http\Request;

class K3BudgetController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $budgets = K3Budget::where('year', $year)->get();
        return view('admin.k3-budgets.index', compact('budgets', 'year'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'item' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'nullable|string'
        ]);

        K3Budget::create($request->all());

        return redirect()->route('admin.k3-budgets.index', ['year' => $request->year])
            ->with('success', 'Data Cost Budgeting K3 berhasil disimpan.');
    }

    public function destroy(K3Budget $k3_budget)
    {
        $year = $k3_budget->year;
        $k3_budget->delete();

        return redirect()->route('admin.k3-budgets.index', ['year' => $year])
            ->with('success', 'Data Budget berhasil dihapus.');
    }
}
