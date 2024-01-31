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
        Schema::create('murid', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nohp", 20);
            $table->string("nis", 25);
            $table->string("nama", 50);
            $table->string("tempat_lahir", 25);
            $table->date("tanggal_lahir");
            $table->string("jenis_kelamin", 25);
            $table->string("alamat");
            $table->uuid("kelas_id");
            $table->foreign("kelas_id")->on("kelas")->references("id")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murid');
    }
};
