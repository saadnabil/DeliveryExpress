<?php

use App\Models\Store;
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
        Schema::create('collection_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Store::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();

            $table->tinyinteger('type')->default(1); //1 talab tagmee3 talabt , talab tagmee3 bake up
            $table->timestamp('date')->nullable();
            $table->text('notes')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            $table->foreignId('city_id')
                ->nullable()
                ->constrained('cities') // Constrain the foreign key to the cities table
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('country_id')
                    ->nullable()
                    ->constrained('countries') // Constrain the foreign key to the countries table
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_requests');
    }
};
