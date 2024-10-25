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
        Schema::table('petty_cash', function (Blueprint $table) {
            $table->boolean('branch_manager_approval')->default(false);
            $table->boolean('general_manager_approval')->default(false);
            $table->boolean('head_of_department_approval')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('petty_cash', function (Blueprint $table) {
            $table->dropColumn(['branch_manager_approval', 'general_manager_approval', 'head_of_department_approval']);
        });
    }
};
