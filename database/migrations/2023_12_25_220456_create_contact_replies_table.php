<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactRepliesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('contact_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
            ->constrained()
            ->onUpdate('cascade');
            $table->bigInteger('user_contact_id');
            $table->string('title');
            $table->string('content');   
            $table->timestamps();         
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts_replies');
    }
};
