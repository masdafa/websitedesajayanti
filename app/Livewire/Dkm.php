<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DkmStaff;
use App\Models\DkmActivity;
use App\Models\DkmFinancialReport;
use App\Models\ZiswafReport;
use App\Models\PhbiEvent;
use App\Models\SiteSetting;
use App\Models\DkmGallery;
use Carbon\Carbon;

class Dkm extends Component
{
    public $selectedMonth = '';
    public $selectedYear = '';

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
        $liveDakwahUrl2 = SiteSetting::get('live_dakwah_url_2', '');
        $liveDakwahUrl3 = SiteSetting::get('live_dakwah_url_3', '');
        $liveDakwahUrl4 = SiteSetting::get('live_dakwah_url_4', '');

        $galleryQuery = DkmGallery::query();
        if ($this->selectedMonth) {
            $galleryQuery->whereMonth('published_date', $this->selectedMonth);
        }
        if ($this->selectedYear) {
            $galleryQuery->whereYear('published_date', $this->selectedYear);
        }
        $galleries = $galleryQuery->latest('published_date')->get();

        $availableYears = DkmGallery::selectRaw('YEAR(published_date) as year')
            ->whereNotNull('published_date')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('livewire.dkm', compact(
            'dkmStaffs', 'activities', 'financialReports', 'ziswafReports', 'phbiEvents', 'profileText', 'visionText', 'liveDakwahUrl', 'liveDakwahUrl2', 'liveDakwahUrl3', 'liveDakwahUrl4', 'galleries', 'availableYears'
        ))->layout('layouts.app', ['title' => 'DKM Musholla']);
    }
}
