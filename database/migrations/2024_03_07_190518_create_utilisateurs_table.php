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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom_complet');
            $table->string('metier')->nullable();
            $table->text('image')->nullable();
            $table->date('datenaissance')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('addresse')->nullable();
            $table->softDeletes();
            $table->string('social_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
