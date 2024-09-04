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
        Schema::create('aplus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->float('minat');
            $table->float('pengalaman');
            $table->float('bakat');
            $table->float('prestasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplus');
    }
};
