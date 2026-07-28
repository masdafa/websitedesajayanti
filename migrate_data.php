<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Konfigurasi koneksi SQLite langsung ke file database.sqlite lama
$sqlitePath = __DIR__ . '/database/database.sqlite';

if (!file_exists($sqlitePath)) {
    die("File database.sqlite tidak ditemukan di: $sqlitePath\n");
}

$pdo = new PDO('sqlite:' . $sqlitePath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$mysqlDb = DB::connection('mysql');
$mysqlDb->statement('SET FOREIGN_KEY_CHECKS=0;');

// Ambil semua nama tabel dari SQLite
$tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'")->fetchAll(PDO::FETCH_COLUMN);

echo "Tabel yang ditemukan di SQLite: " . implode(', ', $tables) . "\n\n";

foreach ($tables as $table) {
    try {
        // Cek apakah tabel ada di MySQL
        $exists = $mysqlDb->getSchemaBuilder()->hasTable($table);
        if (!$exists) {
            echo "Tabel '$table' tidak ada di MySQL, dilewati.\n";
            continue;
        }

        // Truncate tabel di MySQL
        $mysqlDb->table($table)->truncate();

        // Ambil semua data dari SQLite
        $rows = $pdo->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) > 0) {
            // Insert ke MySQL dalam chunks
            $chunks = array_chunk($rows, 200);
            foreach ($chunks as $chunk) {
                $mysqlDb->table($table)->insert($chunk);
            }
            echo "✓ Tabel '$table': " . count($rows) . " baris berhasil dipindahkan.\n";
        } else {
            echo "- Tabel '$table': kosong, dilewati.\n";
        }
    } catch (Exception $e) {
        echo "✗ ERROR pada tabel '$table': " . $e->getMessage() . "\n";
    }
}

$mysqlDb->statement('SET FOREIGN_KEY_CHECKS=1;');
echo "\nSelesai! Semua data SQLite berhasil dipindahkan ke MySQL Laragon.\n";
