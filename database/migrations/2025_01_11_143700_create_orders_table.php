<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID principal

            // Relaciones
            $table->unsignedBigInteger('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->unsignedBigInteger('product_id')->nullable()->constrained('products')->onDelete('set null');
            $table->unsignedBigInteger('invoice_id')->nullable()->constrained('invoices')->onDelete('set null');
            $table->unsignedBigInteger('status_id')->nullable()->constrained('statuses')->onDelete('set null');
            $table->unsignedBigInteger('payment_id')->nullable()->constrained('payments')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->unsignedBigInteger('updated_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->unsignedBigInteger('referal_user_id')->nullable()->constrained('users')->onDelete('set null');

            // Información de la orden
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('discounts', 10, 2)->nullable();
            $table->decimal('shippingCharges', 10, 2)->nullable();
            $table->string('shipperCode')->nullable();
            $table->decimal('IVA', 10, 2)->nullable();
            $table->decimal('IVAReturn', 10, 2)->nullable();

            // Información de entrega
            $table->string('delivery_name')->nullable();
            $table->string('delivery_email')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->string('delivery_to')->nullable();
            $table->string('delivery_from')->nullable();
            $table->text('delivery_message')->nullable();
            $table->dateTime('delivery_date')->nullable();

            // Información de auditoría
            $table->ipAddress('user_ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('request_url')->nullable();
            $table->json('request_data')->nullable();
            $table->string('unique_machine')->nullable();
            $table->string('authorizationResult')->nullable();
            $table->string('authorizationCode')->nullable();
            $table->string('errorCode')->nullable();
            $table->text('errorMessage')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Timestamps y adicionales
            $table->timestamp('added_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_form')->nullable();
            $table->string('session_id')->nullable();
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}