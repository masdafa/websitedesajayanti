<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\Facility;
use App\Models\RoutineActivity;
use App\Models\Siskamling;
use App\Models\ServiceInfo;
use App\Models\DkmStaff;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // Site Settings
        $settings = [
            'hero_title'    => 'Selamat Datang di Jayanti Residence',
            'hero_subtitle' => 'Perumahan yang nyaman, aman, dan asri. Bersama kami wujudkan lingkungan hunian yang harmonis dan berkualitas untuk seluruh warga.',
            'announcement'  => 'Pengumuman: Kerja Bakti Rutin setiap Minggu pertama di awal bulan — Wajib dihadiri seluruh warga',
            'profil_text'   => 'Perumahan Jayanti Residence adalah kawasan hunian modern yang terletak di wilayah strategis dengan fasilitas lengkap. Didirikan dengan visi menjadi kawasan hunian yang nyaman, aman, dan asri, perumahan ini dihuni oleh ratusan keluarga yang hidup rukun dan bergotong-royong.',
            'visi_text'     => 'Menjadi kawasan perumahan yang nyaman, aman, bersih, dan harmonis, dengan pengelolaan yang transparan, partisipatif, dan berorientasi pada kesejahteraan seluruh warga.',
            'misi_text'     => "Meningkatkan keamanan dan ketertiban lingkungan melalui sistem siskamling yang terorganisir\nMenjaga kebersihan dan keindahan lingkungan secara berkala dan berkelanjutan\nMemfasilitasi kegiatan sosial, keagamaan, dan kemasyarakatan warga\nMengelola iuran dan keuangan secara transparan dan akuntabel\nMemperkuat komunikasi dan koordinasi antar warga melalui sistem informasi digital",
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Facilities
        if (Facility::count() === 0) {
            $facilities = [
                ['title' => 'Pos Keamanan 24 Jam', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'sort_order' => 1],
                ['title' => 'Masjid Al-Muhajirin', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'sort_order' => 2],
                ['title' => 'Area Bermain Anak', 'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'sort_order' => 3],
                ['title' => 'Taman & Area Hijau', 'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064', 'sort_order' => 4],
                ['title' => 'Jalan Lingkungan Aspal', 'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7', 'sort_order' => 5],
                ['title' => 'Saluran Drainase', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'sort_order' => 6],
            ];
            foreach ($facilities as $f) {
                Facility::create($f);
            }
        }

        // Routine Activities
        if (RoutineActivity::count() === 0) {
            $activities = [
                ['title' => 'Rapat Rutin RT/RW', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'sort_order' => 1],
                ['title' => 'Kerja Bakti Lingkungan', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'sort_order' => 2],
                ['title' => 'Pengajian Rutin (Bapak-bapak & Ibu-ibu)', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'sort_order' => 3],
                ['title' => 'Senam Pagi Bersama', 'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'sort_order' => 4],
                ['title' => 'Peringatan Hari Besar Nasional', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', 'sort_order' => 5],
            ];
            foreach ($activities as $a) {
                RoutineActivity::create($a);
            }
        }

        // Siskamling
        if (Siskamling::count() === 0) {
            $schedules = [
                ['day' => 'Senin', 'members' => 'Budi, Anto, Rudi', 'sort_order' => 1],
                ['day' => 'Selasa', 'members' => 'Samsul, Heri, Doni', 'sort_order' => 2],
                ['day' => 'Rabu', 'members' => 'Agus, Bambang, Joko', 'sort_order' => 3],
                ['day' => 'Kamis', 'members' => 'Eko, Fajar, Gilang', 'sort_order' => 4],
                ['day' => 'Jumat', 'members' => 'Hendri, Irwan, Jupri', 'sort_order' => 5],
                ['day' => 'Sabtu', 'members' => 'Karno, Latif, Maman', 'sort_order' => 6],
                ['day' => 'Minggu', 'members' => 'Nanang, Oki, Pandu', 'sort_order' => 7],
            ];
            foreach ($schedules as $s) {
                Siskamling::create($s);
            }
        }

        // Service Infos
        if (ServiceInfo::count() === 0) {
            $services = [
                ['title' => 'Pengajuan Surat Keterangan Domisili', 'description' => 'Pengajuan surat pengantar untuk keterangan domisili warga.', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'blue', 'sort_order' => 1],
                ['title' => 'Pelaporan Tamu Menginap (1x24 Jam)', 'description' => 'Wajib melapor jika ada tamu menginap lebih dari 1x24 jam.', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'amber', 'sort_order' => 2],
                ['title' => 'Pengajuan Izin Acara Keramaian', 'description' => 'Perizinan untuk mengadakan acara yang mengundang keramaian.', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'green', 'sort_order' => 3],
                ['title' => 'Pendaftaran Warga Baru', 'description' => 'Pendaftaran data warga yang baru pindah ke lingkungan perumahan.', 'icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z', 'color' => 'blue', 'sort_order' => 4],
                ['title' => 'Layanan Pengaduan Fasilitas Umum', 'description' => 'Laporan terkait kerusakan atau masalah pada fasilitas umum perumahan.', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z', 'color' => 'red', 'sort_order' => 5],
                ['title' => 'Layanan Kebersihan (Iuran Bulanan)', 'description' => 'Informasi terkait iuran bulanan dan pengangkutan sampah rutin.', 'icon' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16', 'color' => 'green', 'sort_order' => 6],
            ];
            foreach ($services as $s) {
                ServiceInfo::create($s);
            }
        }

        $this->command->info('Initial data seeded successfully!');
    }
}
