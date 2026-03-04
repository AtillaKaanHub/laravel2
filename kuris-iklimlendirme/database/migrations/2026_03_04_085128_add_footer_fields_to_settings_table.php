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
       {
    Schema::table('settings', function (Blueprint $table) {

        if (!Schema::hasColumn('settings', 'footer_logo')) {
            $table->string('footer_logo')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_description')) {
            $table->text('footer_description')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_address')) {
            $table->string('footer_address')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_phone')) {
            $table->string('footer_phone')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_email')) {
            $table->string('footer_email')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_work1')) {
            $table->string('footer_work1')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_work2')) {
            $table->string('footer_work2')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_work3')) {
            $table->string('footer_work3')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_facebook')) {
            $table->string('footer_facebook')->nullable();
        }

        if (!Schema::hasColumn('settings', 'footer_instagram')) {
            $table->string('footer_instagram')->nullable();
        }

    });
}
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
