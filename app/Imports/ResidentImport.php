<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResidentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Sesuaikan dengan header di excel, misalnya 'nama_lengkap', 'blok_rumah', dll.
        // Jika header di Excel menggunakan spasi seperti "Nama Lengkap", maatwebsite akan mengubahnya menjadi "nama_lengkap" (snake_case).
        if (empty($row['nama_lengkap'])) {
            return null; // Abaikan jika nama lengkap kosong
        }

        return new Resident([
            'nama_lengkap' => $row['nama_lengkap'] ?? null,
            'nik'          => $row['nik'] ?? null,
            'no_kk'        => $row['no_kk'] ?? null,
            'blok_rumah'   => $row['blok_rumah'] ?? null,
            'no_hp'        => $row['no_hp'] ?? null,
            'status_warga' => $row['status_warga'] ?? null,
            'agama'        => $row['agama'] ?? null,
            'pekerjaan'    => $row['pekerjaan'] ?? null,
        ]);
    }
}
