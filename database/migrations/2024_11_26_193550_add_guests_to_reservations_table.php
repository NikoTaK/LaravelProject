<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->integer('guests')->after('check_out')->default(1); // Add the guests column
            $table->string('special_requests')->nullable()->after('guests'); // Add special_requests if needed
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['guests', 'special_requests']); // Remove guests and special_requests columns if rolled back
        });
    }
};
