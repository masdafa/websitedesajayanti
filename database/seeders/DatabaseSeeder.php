<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Gallery;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Desa',
            'email' => 'admin@jayanti.desa.id',
            'password' => bcrypt('password'),
        ]);

        // Seed Posts
        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'title' => "Kegiatan Pembangunan Desa Bagian $i",
                'slug' => Str::slug("Kegiatan Pembangunan Desa Bagian $i"),
                'content' => "<p>Pemerintah Desa Jayanti terus berupaya meningkatkan kualitas infrastruktur dan pelayanan masyarakat. Pada kesempatan kali ini, kami melaksanakan program pembangunan jalan desa dan perbaikan fasilitas kesehatan di dusun setempat.</p><p>Diharapkan dengan adanya perbaikan ini, aktivitas perekonomian warga dapat berjalan lebih lancar dan kesejahteraan masyarakat semakin meningkat. Terima kasih atas partisipasi aktif seluruh warga desa dalam bergotong royong.</p>",
                'image' => null, // Placeholder will be handled in blade
                'is_published' => true,
            ]);
        }

        // Seed Staff
        $staffs = [
            ['name' => 'Budi Santoso', 'position' => 'Kepala Desa', 'order' => 1],
            ['name' => 'Siti Aminah', 'position' => 'Sekretaris Desa', 'order' => 2],
            ['name' => 'Ahmad Fauzi', 'position' => 'Kaur Keuangan', 'order' => 3],
            ['name' => 'Rina Mulyani', 'position' => 'Kasi Pemerintahan', 'order' => 4],
        ];

        foreach ($staffs as $staff) {
            Staff::create($staff);
        }

        // Seed Gallery
        for ($i = 1; $i <= 6; $i++) {
            Gallery::create([
                'title' => "Dokumentasi Kegiatan $i",
                'description' => "Foto kegiatan gotong royong dan acara adat di balai desa.",
                'image' => '', // Blade will show empty state
            ]);
        }
    }
}
