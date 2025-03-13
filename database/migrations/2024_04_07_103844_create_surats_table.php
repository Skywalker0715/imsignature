<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  App\Models\Surat;

use function PHPUnit\Framework\assertNotTrue;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('kepada');
            $table->string('perihal');
            $table->tinyInteger('users_id')->constrained('users');
            $table->binary('file_surat')->nullable();
            $table->boolean('status_diterima')->default(true);
            $table->boolean('status_ditolak')->default(false);
            $table->date('tanggal_kirim')->nullable()->format('d/m/Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
