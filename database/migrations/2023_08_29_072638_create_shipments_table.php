<?php

use App\Models\ShipmentType;
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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->softDeletes();
            $table->string('shipment_code')->nullable();
            $table->foreignIdFor(ShipmentType::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignIdFor(Store::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->integer('quantity')->default(0);
            $table->text('description')->nullable();
            $table->double('money')->nullable(); //required when type is عربون
            $table->double('weight')->nullable();
            $table->double('length')->nullable();
            $table->double('height')->nullable();
            $table->double('width')->nullable();
            $table->tinyInteger('breakable')->default(0);
            $table->tinyInteger('measurement_is_allowed')->default(0);
            $table->tinyInteger('shipment_packaging')->default(0);
            $table->tinyInteger('preview_allowed')->default(0);
            $table->text('notes')->nullable();
            //required when type is تبادل متعدد
            $table->foreignId('shipment_replaced_id')
            ->nullable()
            ->constrained('shipments') // Assuming the table name is "shipments"
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->text('shipment_replace_reason')->nullable();
            //required when type is تبادل متعدد
            $table->string('client_name')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_other_phone')->nullable();

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

            $table->text('client_address')->nullable();
            $table->tinyInteger('payment_type')->default(1);//1 for cash , 2 for visa
            $table->longText('qr_code_image')->nullable();
            $table->string('status')->default('incomplete')->nullable(); // incomplete , pending   , in_stock , recieved_by_delivery , out_for_delivery , delivered , failed , returned
            $table->double('shipment_price')->default(0)->nullable();//
            $table->double('delivery_fee')->default(0)->nullable();//
            $table->double('weight_fee')->default(0)->nullable();//
            $table->double('discount_fee')->default(0)->nullable();//
            $table->double('total_fee')->default(0)->nullable();//
            $table->double('collect_fee')->default(0)->nullable();//

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
