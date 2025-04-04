<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('site_user', function (Blueprint $table) {
            $table->id();
            $table->string('email_address')->unique();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('unit_number')->nullable();
            $table->string('street_number')->nullable();
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('region');
            $table->string('postal_code');
            $table->foreignId('country_id')->constrained('country')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->string('country_name')->unique();
        });

        Schema::create('user_address', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('site_user')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('address')->onDelete('cascade');
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        Schema::create('user_payment_method', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('site_user')->onDelete('cascade');
            $table->foreignId('payment_type_id')->constrained('payment_type')->onDelete('cascade');
            $table->string('provider');
            $table->string('account_number');
            $table->date('expiry_date')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        Schema::create('payment_type', function (Blueprint $table) {
            $table->id();
            $table->string('value')->unique();
        });

        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('site_user')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('shopping_cart_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('shopping_cart')->onDelete('cascade');
            $table->foreignId('product_item_id')->constrained('product_item')->onDelete('cascade');
            $table->integer('qty');
            $table->timestamps();
        });

        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_category_id')->nullable()->constrained('product_category')->onDelete('cascade');
            $table->string('category_name');
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('product_category')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('product_image')->nullable();
            $table->timestamps();
        });

        Schema::create('product_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('product')->onDelete('cascade');
            $table->string('SKU')->unique();
            $table->integer('qty_in_stock');
            $table->string('product_image')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        Schema::create('variation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('product_category')->onDelete('cascade');
            $table->string('name');
        });

        Schema::create('variation_option', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variation_id')->constrained('variation')->onDelete('cascade');
            $table->string('value');
        });

        Schema::create('product_configuration', function (Blueprint $table) {
            $table->foreignId('product_item_id')->constrained('product_item')->onDelete('cascade');
            $table->foreignId('variation_option_id')->constrained('variation_option')->onDelete('cascade');
        });

        Schema::create('shop_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('site_user')->onDelete('cascade');
            $table->timestamp('order_date');
            $table->foreignId('payment_method_id')->constrained('user_payment_method')->onDelete('cascade');
            $table->foreignId('shipping_address')->constrained('address')->onDelete('cascade');
            $table->foreignId('shipping_method')->constrained('shipping_method')->onDelete('cascade');
            $table->decimal('order_total', 10, 2);
            $table->foreignId('order_status')->constrained('order_status')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('order_line', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_item_id')->constrained('product_item')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('shop_order')->onDelete('cascade');
            $table->integer('qty');
            $table->decimal('price', 10, 2);
        });

        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        Schema::create('user_review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('site_user')->onDelete('cascade');
            $table->foreignId('ordered_product_id')->constrained('order_line')->onDelete('cascade');
            $table->integer('rating_value');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_review');
        Schema::dropIfExists('order_status');
        Schema::dropIfExists('order_line');
        Schema::dropIfExists('shop_order');
        Schema::dropIfExists('product_configuration');
        Schema::dropIfExists('variation_option');
        Schema::dropIfExists('variation');
        Schema::dropIfExists('product_item');
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('shopping_cart_item');
        Schema::dropIfExists('shopping_cart');
        Schema::dropIfExists('payment_type');
        Schema::dropIfExists('user_payment_method');
        Schema::dropIfExists('user_address');
        Schema::dropIfExists('address');
        Schema::dropIfExists('country');
        Schema::dropIfExists('site_user');
    }
};
