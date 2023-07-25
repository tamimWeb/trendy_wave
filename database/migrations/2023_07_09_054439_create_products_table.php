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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->default(0);
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->json('colors_id')->nullable();
            $table->json('sizes')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('images')->nullable();
            $table->text('full_description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('additional_info')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('alert_quantity')->default(0);
            $table->double('purchase_price')->default(0.00);
            $table->double('selling_price')->default(0.00);
            $table->double('discount')->default(0.00);
            $table->string('discount_type')->default('percentage');
            $table->double('after_discount')->default(0.00);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('tags')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->tinyInteger('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
