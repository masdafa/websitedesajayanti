<?php

namespace App\Livewire;

use App\Models\K3Deposit;
use App\Models\K3Budget;
use Livewire\Component;

class IuranK3 extends Component
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
        $reports = K3Deposit::where('year', $this->year)->get();
        $budgets = K3Budget::where('year', $this->year)->get();
        
        $months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        $reports = $reports->sortBy(function($report) use ($months) {
            return array_search($report->month, $months);
        });

        // Prepare data for Chart.js
        $labels = [];
        $rt23Data = [];
        $rt24Data = [];
        $rt25Data = [];
        $jumlahData = [];

        foreach ($months as $m) {
            $labels[] = $m;
            $report = $reports->where('month', $m)->first();
            $rt23Data[] = $report ? $report->rt_23 : 0;
            $rt24Data[] = $report ? $report->rt_24 : 0;
            $rt25Data[] = $report ? $report->rt_25 : 0;
            $jumlahData[] = $report ? $report->jumlah : 0;
        }

        return view('livewire.iuran-k3', [
            'labels' => $labels,
            'rt23Data' => $rt23Data,
            'rt24Data' => $rt24Data,
            'rt25Data' => $rt25Data,
            'jumlahData' => $jumlahData,
            'reports' => $reports,
            'budgets' => $budgets,
        ])->layout('layouts.app');
    }
}
