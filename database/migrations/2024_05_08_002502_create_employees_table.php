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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('services_id')->nullable(false)->constrained('services')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name',25)->nullable(false);
            $table->string('paternal surname',25)->nullable(false);
            $table->string('maternal surname',25)->nullable(true);
            $table->string('address',45)->nullable(true);
            $table->string('phone',15)->nullable(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
