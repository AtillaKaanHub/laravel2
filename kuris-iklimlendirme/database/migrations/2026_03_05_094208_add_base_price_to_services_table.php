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
       Schema::table('services', function (Blueprint $table) {
        if (!Schema::hasColumn('services', 'base_price')) {
            $table->decimal('base_price', 10, 2)->default(0);
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('services', function (Blueprint $table) {
        $table->dropColumn('base_price');
    });
    }
};
