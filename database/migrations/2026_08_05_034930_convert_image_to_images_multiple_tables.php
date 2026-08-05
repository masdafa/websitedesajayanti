<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = ['posts', 'galleries', 'products', 'facilities', 'phbi_events', 'dkm_galleries', 'posyandu_galleries'];
        foreach ($tables as $t) {
            Schema::table($t, function (Blueprint $table) {
                $table->json('images')->nullable();
            });

            // Migrate data
            \Illuminate\Support\Facades\DB::table($t)->whereNotNull('image')->get()->each(function($row) use ($t) {
                \Illuminate\Support\Facades\DB::table($t)->where('id', $row->id)->update([
                    'images' => json_encode([$row->image])
                ]);
            });

            Schema::table($t, function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['posts', 'galleries', 'products', 'facilities', 'phbi_events', 'dkm_galleries', 'posyandu_galleries'];
        foreach ($tables as $t) {
            Schema::table($t, function (Blueprint $table) {
                $table->string('image')->nullable();
            });
            Schema::table($t, function (Blueprint $table) {
                $table->dropColumn('images');
            });
        }
    }
};
