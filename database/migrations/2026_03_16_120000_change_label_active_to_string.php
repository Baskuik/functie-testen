<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Eerst bestaande boolean waarden omzetten naar strings
        DB::table('labels')->where('label_active', true)->update(['label_active' => 'ja']);
        DB::table('labels')->where('label_active', false)->update(['label_active' => 'nee']);

        Schema::table('labels', function (Blueprint $table) {
            $table->string('label_active', 3)->nullable()->default(null)->change();
        });
    }

    public function down(): void
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->boolean('label_active')->nullable()->default(null)->change();
        });
    }
};