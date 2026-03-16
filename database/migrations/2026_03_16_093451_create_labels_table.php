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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('label_name');
            $table->string('wiki_id')->nullable();
            $table->string('conn_id')->nullable();
            $table->unsignedBigInteger('labelable_id')->nullable();
            $table->string('labelable_type')->nullable();
            $table->integer('label_position')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('labels');
            $table->boolean('label_active')->default(true); // Ja/Nee wordt boolean
            // Laravel regelt de create/change dates automatisch met timestamps:
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labels');
    }
};
