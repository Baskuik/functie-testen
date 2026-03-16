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
        Schema::table('labels', function (Blueprint $table) {
            // We maken er een string van, die standaard NULL is
            $table->string('label_active')->nullable()->default(null)->change();
        });
    }
    
    public function down(): void
    {
        Schema::table('labels', function (Blueprint $table) {
            // Terugdraaien naar boolean als dat nodig is
            $table->boolean('label_active')->nullable()->default(null)->change();
        });
    }
};
