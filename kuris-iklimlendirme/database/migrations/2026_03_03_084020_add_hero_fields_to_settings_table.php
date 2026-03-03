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

        if (!Schema::hasColumn('settings', 'hero_badge')) {
            $table->string('hero_badge')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_title')) {
            $table->string('hero_title')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_description')) {
            $table->text('hero_description')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_button_text')) {
            $table->string('hero_button_text')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_button_link')) {
            $table->string('hero_button_link')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_phone')) {
            $table->string('hero_phone')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_image')) {
            $table->string('hero_image')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_feature_title')) {
            $table->string('hero_feature_title')->nullable();
        }

        if (!Schema::hasColumn('settings', 'hero_feature_subtitle')) {
            $table->string('hero_feature_subtitle')->nullable();
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
