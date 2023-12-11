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
        Schema::create('my_passwords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->index()->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('user_name')->nullable();
            $table->string('url')->nullable();
            $table->text('password')->nullable();
            $table->text('notes')->nullable();
            $table->string('parameters')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_passwords');
    }
};
