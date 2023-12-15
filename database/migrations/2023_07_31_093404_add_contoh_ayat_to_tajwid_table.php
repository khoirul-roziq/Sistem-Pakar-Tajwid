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
        Schema::table('tajwid', function (Blueprint $table) {
            //
            $table->integer('ex_surah')->nullable();
            $table->integer('ex_ayah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tajwid', function (Blueprint $table) {
            //
        });
    }
};
