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
        Schema::create('k3_deposits', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('month');
            $table->integer('rt_23')->default(0);
            $table->integer('rt_24')->default(0);
            $table->integer('rt_25')->default(0);
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k3_deposits');
    }
};
