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
    Schema::create('settings', function (Blueprint $table) {
        $table->id();

        // Menü
        $table->string('menu_home')->nullable();
        $table->string('menu_services')->nullable();
        $table->string('menu_corporate')->nullable();
        $table->string('menu_contact')->nullable();

        // Logo
        $table->string('logo')->nullable();

        // Footer
        $table->string('footer_company_name')->nullable();
        $table->text('footer_description')->nullable();
        $table->string('footer_phone')->nullable();
        $table->string('footer_email')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
