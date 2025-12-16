<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('request_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('supply_requests', 'request_id')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['request_id', 'staff_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_staff');
    }
};
