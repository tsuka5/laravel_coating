<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateTgaTestsTable extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::disableForeignKeyConstraints();

//         Schema::create('tga_tests', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('composition_id')
//             ->references('id')->on('material_compositions')
//             ->constrained()
//             ->onUpdate('cascade')
//             ->onDelete('cascade');
//             $table->float('odt')->nullable();
//             $table->float('mdt')->nullable();
//             $table->float('edt')->nullable();
//             $table->text('memo')->nullable();
//         });

//         Schema::enableForeignKeyConstraints();

//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('tga_tests');
//     }
// };


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTgaTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('tga_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experiment_id')
            ->references('id')->on('experiments')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->bigInteger('gas_id')->nullable();
            $table->float('flow_rate')->nullable();
            $table->float('start_temperature')->nullable();
            $table->float('end_temperature')->nullable();
            $table->float('temperature_range')->nullable();
            $table->float('heating_rate')->nullable();
            $table->text('memo')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tga_tests');
    }
};
