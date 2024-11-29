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
        Schema::create('cache', function (Blueprint $table) {
            // Define 'key' column with 191 characters, which avoids the index size issue.
            $table->string('key', 191)->primary(); // 191 characters instead of 255
            $table->mediumText('value');
            $table->integer('expiration');
        });
        
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 191)->primary(); // Using 191 characters to stay within limit
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
