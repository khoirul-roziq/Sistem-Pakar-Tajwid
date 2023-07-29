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
        Schema::create('rule_tajwid_tanda_tajwid', function (Blueprint $table) {
            $table->id();
            $table->integer('rule_tajwid_id');
            $table->integer('tanda_tajwid_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule_tajwid_tanda_tajwid');
    }
};
