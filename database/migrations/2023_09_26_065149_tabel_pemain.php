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
        Schema::create('pemain_bola', function (Blueprint $table) {
            $table->increments("id_pemain");
            $table->string("nama_pemain");
            $table->integer("no_punggung");
            $table->string("posisi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemainp');
    }
};
