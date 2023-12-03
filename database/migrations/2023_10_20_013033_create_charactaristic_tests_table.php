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
            $table->foreignId('experiment_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('ph')->nullable();
            $table->float('shear_rate')->nullable();
            $table->float('shear_stress')->nullable();
            $table->float('viscosity')->nullable();
            $table->float('moisture_content')->nullable();
            $table->float('water_solubility')->nullable();
            $table->float('wvp')->nullable();
            $table->float('thickness')->nullable();
            $table->float('contact_angle')->nullable();
            $table->float('tensile_strength')->nullable();
            $table->text('afm1')->nullable();
            $table->text('afm2')->nullable();
            $table->text('sem1')->nullable();
            $table->text('sem2')->nullable();
            $table->text('dsc1')->nullable();
            $table->text('dsc2')->nullable();
            $table->text('ftir1')->nullable();
            $table->text('ftir2')->nullable();

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
