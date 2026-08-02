<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DkmStaff;
use App\Models\DkmActivity;
use App\Models\DkmFinancialReport;
use App\Models\ZiswafReport;
use App\Models\PhbiEvent;
use App\Models\SiteSetting;

class Dkm extends Component
{
    public function render()
    {
        $dkmStaffs = DkmStaff::orderBy('sort_order')->get();
        $activities = DkmActivity::latest()->get();
        $financialReports = DkmFinancialReport::orderBy('year', 'desc')->orderBy('month', 'desc')->get();
        $ziswafReports = ZiswafReport::latest()->get();
        $phbiEvents = PhbiEvent::latest()->get();
        
        $profileText = SiteSetting::get('dkm_profile_text', 'Musholla Al-Ikhlas Jayanti Residence adalah pusat kegiatan ibadah dan sosial kemasyarakatan.');
        $visionText = SiteSetting::get('dkm_vision_text', 'Mewujudkan masyarakat Islami yang sejahtera, rukun, dan damai di lingkungan Jayanti Residence.');
        $liveDakwahUrl = SiteSetting::get('live_dakwah_url', 'https://youtube.com/');

        return view('livewire.dkm', compact(
            'dkmStaffs', 'activities', 'financialReports', 'ziswafReports', 'phbiEvents', 'profileText', 'visionText', 'liveDakwahUrl'
        ))->layout('layouts.app', ['title' => 'DKM Musholla']);
    }
}
