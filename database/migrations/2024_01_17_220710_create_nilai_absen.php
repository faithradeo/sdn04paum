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
        Schema::create('nilai_absen', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->integer("alpha");
            $table->integer("hadir");
            $table->integer("izin");
            $table->integer("sakit");

            // relasi ke murid
            $table->uuid("murid_id");
            $table->foreign("murid_id")->on("murid")->references("id")->onDelete("cascade");

            // relasi ke tabel kelas
            $table->uuid("kelas_id");
            $table->foreign("kelas_id")->on("kelas")->references("id")->onDelete("cascade");

            $table->string("semester", 15);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_absen');
    }
};
