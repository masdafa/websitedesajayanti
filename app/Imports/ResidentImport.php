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
        // Abaikan jika tidak ada blok
        if (empty($row['block'])) {
            return null; 
        }

        return new Resident([
            'block'       => $row['block'] ?? null,
            'rt'          => $row['rt'] ?? null,
            'nama_ayah'   => $row['nama_ayah'] ?? null,
            'nama_ibu'    => $row['nama_ibu'] ?? null,
            'nama_anak_1' => $row['nama_anak_1'] ?? null,
            'nama_anak_2' => $row['nama_anak_2'] ?? null,
            'nama_anak_3' => $row['nama_anak_3'] ?? null,
            'nama_anak_4' => $row['nama_anak_4'] ?? null,
            'nama_anak_5' => $row['nama_anak_5'] ?? null,
            'nama_anak_6' => $row['nama_anak_6'] ?? null,
            'keterangan'  => $row['keterangan'] ?? null,
        ]);
    }
}
