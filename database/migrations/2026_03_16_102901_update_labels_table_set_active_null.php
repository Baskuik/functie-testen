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
        // We maken de kolom nullable en zetten de default op null
        // Omdat het een boolean is (0/1), regelen we de "Ja/Nee" in de interface
        $table->boolean('label_active')->nullable()->default(null)->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
