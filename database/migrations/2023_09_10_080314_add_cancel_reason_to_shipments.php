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
        Schema::table('shipments', function (Blueprint $table) {

            $table->foreignId('cancel_reason_id')
            ->nullable()
            ->constrained('cancel_reasons') // Constrain the foreign key to the cancel reasons table
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->text('cancel_reason_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            //
        });
    }
};
