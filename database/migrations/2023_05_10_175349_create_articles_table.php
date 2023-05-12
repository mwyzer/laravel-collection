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
        Schema::create('articles', function (Blueprint $table) {
            $table  ->id();
            $table  ->foreignId(column: 'user_id')
                    ->constrained(table: 'users')
                    ->cascadeOnDelete();
            $table  ->string(column: 'title')
                    ->unique();
            $table  ->longText(column:'description');
            $table  ->text(column: 'excerpt')->nullable();
            $table  ->boolean(column:'is_published')->default(value: false);
            $table  ->integer(column:'min_to_read')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
