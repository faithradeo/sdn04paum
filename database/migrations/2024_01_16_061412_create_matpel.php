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
        Schema::create('matpel', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nama", 50);
            $table->uuid("kelas_id");
            $table->foreign("kelas_id")->on("kelas")->references("id")->onDelete("cascade");
            $table->string("semester", 10); // ganjil / genap
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->on("users")->references("id")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matpel');
    }
};
