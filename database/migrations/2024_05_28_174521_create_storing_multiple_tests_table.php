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
        
        Schema::create('storing_multiple_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('composition_id')
            ->constrained('material_compositions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('day')->nullable();
            $table->float('mass_loss_rate')->nullable();
            $table->float('l')->nullable();
            $table->float('a')->nullable();
            $table->float('b')->nullable();
            $table->float('e')->nullable();
            $table->float('ph')->nullable();
            $table->float('tss')->nullable();
            $table->float('hardness')->nullable();
            $table->float('moisture_content')->nullable();
            $table->float('ta')->nullable();
            $table->float('vitamin_c')->nullable();
            $table->float('rr')->nullable();
            $table->float('phenolic_content')->nullable();
            $table->text('sem')->nullable();
            $table->text('clsm')->nullable();
            $table->text('afm')->nullable();
            $table->text('ftir')->nullable();
            $table->text('dsc')->nullable();
            $table->text('memo')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storing_multiple_tests');
    }
};
