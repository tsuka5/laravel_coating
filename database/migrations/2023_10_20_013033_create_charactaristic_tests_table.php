<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactaristicTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('charactaristic_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('composition_id')
            ->references('id')->on('material_compositions')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('ph')->nullable();
            $table->float('temperature')->nullable();
            $table->float('shear_rate')->nullable();
            $table->float('shear_stress')->nullable();
            $table->float('rotation_speed')->nullable();
            $table->float('viscosity')->nullable();
            $table->float('mc')->nullable();
            $table->float('ws')->nullable();
            $table->float('wvp')->nullable();
            $table->float('thickness')->nullable();
            $table->float('ca')->nullable();
            $table->float('ts')->nullable();
            $table->text('afm')->nullable();
            $table->text('sem')->nullable();
            $table->text('dsc')->nullable();
            $table->text('ftir')->nullable();
            $table->text('clsm')->nullable();
            $table->float('d43')->nullable();
            $table->float('d32')->nullable();
            $table->float('eab')->nullable();
            $table->float('light_transmittance')->nullable();
            $table->float('xrd')->nullable();
            

            

        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charactaristic_tests');
    }
};
