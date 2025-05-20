<?php

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
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->string('client_name');
            $table->enum('status', ['new', 'done'])->default('new');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->index('product_id', 'idx_orders_product_id');
            $table->index(['status', 'created_at'], 'idx_orders_status_created_at');
            $table->index('status', 'idx_orders_active')->where('status', 'new');
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
