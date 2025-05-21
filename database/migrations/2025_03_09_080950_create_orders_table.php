<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('client_name', 60);
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('quantity');
            $table->tinyInteger('status')->default(StatusEnum::New->value);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->index('product_id', 'idx_orders_product_id');
            $table->index(['status', 'created_at'], 'idx_orders_status_created_at');
            $table->index('status', 'idx_orders_active')->where('status', 0);
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
};
