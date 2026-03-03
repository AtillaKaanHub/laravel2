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
        Schema::table('settings', function (Blueprint $table) {

        if (!Schema::hasColumn('settings', 'about_title')) {
            $table->string('about_title')->nullable();
        }

        if (!Schema::hasColumn('settings', 'about_description')) {
            $table->text('about_description')->nullable();
        }

        if (!Schema::hasColumn('settings', 'about_image')) {
            $table->string('about_image')->nullable();
        }

        if (!Schema::hasColumn('settings', 'about_item1')) {
            $table->string('about_item1')->nullable();
        }

        if (!Schema::hasColumn('settings', 'about_item2')) {
            $table->string('about_item2')->nullable();
        }

        if (!Schema::hasColumn('settings', 'about_item3')) {
            $table->string('about_item3')->nullable();
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
