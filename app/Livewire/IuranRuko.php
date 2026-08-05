<?php

namespace App\Livewire;

use App\Models\RukoFinancialReport;
use App\Models\RukoDeposit;
use Livewire\Component;

class IuranRuko extends Component
{
    public $selectedYear;

    public function mount()
    {
        $this->selectedYear = (int) date('Y');
    }

    public function setYear($year)
    {
        $this->selectedYear = $year;
    }

    public function render()
    {
        $currentYear = (int) date('Y');
        $startYear = 2020;
        
        $years = range($startYear, $currentYear);
        
        $labels = [];
        $incomeData = [];
        $expenseData = [];
        $balanceData = [];
        $yearlyReports = [];
        $totalIncome = 0;
        $totalExpense = 0;
        
        foreach ($years as $year) {
            $labels[] = 'Tahun ' . $year;
            
            $income = RukoFinancialReport::where('year', $year)->sum('income');
            $expense = RukoFinancialReport::where('year', $year)->sum('expense');
            $balance = $income - $expense; 
            
            $totalIncome += $income;
            $totalExpense += $expense;
            
            $incomeData[] = $income;
            $expenseData[] = $expense;
            $balanceData[] = $balance;
            
            $yearlyReports[] = [
                'year' => $year,
                'income' => $income,
                'expense' => $expense,
                'balance' => $balance
            ];
        }
        
        $totalBalance = $totalIncome - $totalExpense;

        $rukoDeposits = RukoDeposit::where('year', $this->selectedYear)
                                   ->orderBy('ruko_no')
                                   ->get();

        return view('livewire.iuran-ruko', [
            'labels' => $labels,
            'incomeData' => $incomeData,
            'expenseData' => $expenseData,
            'balanceData' => $balanceData,
            'yearlyReports' => $yearlyReports,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'totalBalance' => $totalBalance,
            'rukoDeposits' => $rukoDeposits,
            'yearsList' => $years,
        ])->layout('layouts.app');
    }
}
