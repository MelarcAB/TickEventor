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
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //description
            $table->text('description')->nullable();
            //price
            $table->decimal('price', 8, 2);
            //price_rate (si este campo está a null, el precio es fijo, si no, es un porcentaje respecto al precio del evento)
            $table->decimal('price_rate', 8, 2)->nullable();
            //capacity
            $table->integer('capacity');
            //event
            $table->foreignId('event_id')->constrained();
            $table->timestamps();
            //foreign keys
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_types');
    }
};
