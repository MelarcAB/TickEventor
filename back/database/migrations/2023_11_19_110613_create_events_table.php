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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            //name
            $table->string('name');
            //description
            $table->text('description')->nullable();
            //event time
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            //event place
            $table->string('place');
            //event price
            $table->decimal('price', 8, 2);
            //event capacity
            $table->integer('capacity');
            //event image
            $table->string('image')->nullable();
            //event category
            $table->foreignId('event_category_id')->constrained();

            //slug
            $table->string('slug')->unique();
         
            //foreign keys
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users')->nullable();
            $table->foreignId('deleted_by')->nullable()->constrained('users');
   
            //timestamps
            $table->timestamps();
            $table->softDeletes();
            
            //indexes
            $table->index('start_date');
            $table->index('end_date');
            $table->index('place');
            $table->index('name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
