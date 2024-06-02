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
        Schema::disableForeignKeyConstraints();

        Schema::create('wvp_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('composition_id')
            ->references('id')->on('material_compositions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->float('wvp')->nullable();
            $table->text('memo')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wvp_tests');
    }
};
