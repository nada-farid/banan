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
        Schema::create('dynamic_settings_fields', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // مثل: 'about_us', 'governance'
            $table->string('title'); // العنوان
            $table->text('content')->nullable(); // المحتوى
            $table->integer('order')->default(0); // ترتيب العرض
            $table->boolean('is_active')->default(true); // تفعيل/تعطيل الحقل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_settings_fields');
    }
};
