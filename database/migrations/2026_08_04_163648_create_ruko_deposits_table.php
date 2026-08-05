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
        Schema::create('ruko_deposits', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('name');
            $table->string('ruko_no');
            $table->decimal('january', 15, 2)->default(0);
            $table->decimal('february', 15, 2)->default(0);
            $table->decimal('march', 15, 2)->default(0);
            $table->decimal('april', 15, 2)->default(0);
            $table->decimal('may', 15, 2)->default(0);
            $table->decimal('june', 15, 2)->default(0);
            $table->decimal('july', 15, 2)->default(0);
            $table->decimal('august', 15, 2)->default(0);
            $table->decimal('september', 15, 2)->default(0);
            $table->decimal('october', 15, 2)->default(0);
            $table->decimal('november', 15, 2)->default(0);
            $table->decimal('december', 15, 2)->default(0);
            $table->integer('deposit_count')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruko_deposits');
    }
};
