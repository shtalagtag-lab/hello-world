<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Departments table already created in staff migration to avoid foreign key issues
    }

    public function down(): void
    {
        // Departments table dropped in staff migration rollback
    }
};
