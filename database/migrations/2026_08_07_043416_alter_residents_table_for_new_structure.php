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
        Schema::table('residents', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn([
                'nama_lengkap', 'nik', 'no_kk', 'blok_rumah', 'no_hp', 'status_warga', 'agama', 'pekerjaan'
            ]);
            
            // Add new columns
            $table->string('block')->nullable();
            $table->string('rt')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_anak_1')->nullable();
            $table->string('nama_anak_2')->nullable();
            $table->string('nama_anak_3')->nullable();
            $table->string('nama_anak_4')->nullable();
            $table->string('nama_anak_5')->nullable();
            $table->string('nama_anak_6')->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('residents', function (Blueprint $table) {
            $table->dropColumn([
                'block', 'rt', 'nama_ayah', 'nama_ibu', 
                'nama_anak_1', 'nama_anak_2', 'nama_anak_3', 
                'nama_anak_4', 'nama_anak_5', 'nama_anak_6', 'keterangan'
            ]);
            
            $table->string('nama_lengkap');
            $table->string('nik')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('blok_rumah')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('status_warga')->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
        });
    }
};
