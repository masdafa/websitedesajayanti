<?php

namespace App\Livewire;

use App\Models\FinancialReport;
use Livewire\Component;

class IuranRw extends Component
{
    public $year;
    
    public function mount()
    {
        $this->year = date('Y');
    }

    public function setYear($y)
    {
        $this->year = $y;
        $this->dispatch('chart-updated');
    }

    public function render()
    {
        $reports = FinancialReport::where('year', $this->year)->get();
        
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $reports = $reports->sortBy(function($report) use ($months) {
            return array_search($report->month, $months);
        });

        // Prepare data for Chart.js
        $labels = [];
        $incomeData = [];
        $expenseData = [];
        $balanceData = [];

        foreach ($months as $m) {
            $labels[] = $m;
            $report = $reports->where('month', $m)->first();
            $incomeData[] = $report ? $report->income : 0;
            $expenseData[] = $report ? $report->expense : 0;
            $balanceData[] = $report ? $report->balance : 0;
        }

        return view('livewire.iuran-rw', [
            'labels' => $labels,
            'incomeData' => $incomeData,
            'expenseData' => $expenseData,
            'balanceData' => $balanceData,
            'reports' => $reports,
        ])->layout('layouts.app');
    }
}
