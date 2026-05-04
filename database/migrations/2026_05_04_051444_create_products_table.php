<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_category_id')
                ->constrained('product_categories')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->string('thickness')->nullable();
            $table->string('material_type')->nullable();
            $table->string('application')->nullable();
            $table->string('key_feature')->nullable();
            $table->string('options')->nullable();

            $table->text('badges')->nullable();
            $table->text('specs')->nullable();

            $table->boolean('is_featured')->default(0);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->index(['product_category_id', 'status']);
            $table->index(['is_featured', 'status']);
            $table->index(['sort_order', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};