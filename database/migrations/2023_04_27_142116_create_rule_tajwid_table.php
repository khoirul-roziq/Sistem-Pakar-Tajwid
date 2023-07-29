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
        Schema::create('rule_tajwid', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->integer('id_tajwid');
            $table->string('deleted_tajwid_name')->nullable();
            $table->string('rule')->unique();
            $table->string('second_rule')->unique()->nullable();
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule_tajwid');
    }
};
