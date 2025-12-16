<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Create departments (no dependencies)
        Schema::create('departments', function (Blueprint $table) {
            $table->id('department_id');
            $table->string('department_name')->unique();
            $table->timestamps();
        });

        // 2. Create staff (depends on departments)
        Schema::create('staff', function (Blueprint $table) {
            $table->id('staff_id');
            $table->string('name');
            $table->foreignId('department_id')->constrained('departments', 'department_id')->onDelete('cascade');
            $table->string('role');
            $table->timestamps();
        });

        // 3. Create accounts (depends on staff)
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('account_id');
            $table->foreignId('staff_id')->unique()->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->string('user_name')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // 4. Create supply items (no dependencies)
        Schema::create('supply_items', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('name')->unique();
            $table->string('category');
            $table->integer('quantity_in_stock')->default(0);
            $table->timestamps();
        });

        // 5. Create request statuses (no dependencies)
        Schema::create('request_statuses', function (Blueprint $table) {
            $table->id('status_id');
            $table->string('status_name')->unique();
            $table->timestamps();
        });

        // 6. Create supply requests (depends on staff and request_statuses)
        Schema::create('supply_requests', function (Blueprint $table) {
            $table->id('request_id');
            $table->foreignId('staff_id')->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->date('request_date');
            $table->text('purpose');
            $table->foreignId('status_id')->constrained('request_statuses', 'status_id')->onDelete('restrict');
            $table->timestamps();
        });

        // 7. Create request details (depends on supply_requests and supply_items)
        Schema::create('request_details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->foreignId('request_id')->constrained('supply_requests', 'request_id')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('supply_items', 'item_id')->onDelete('cascade');
            $table->integer('quantity_requested');
            $table->integer('quantity_issued')->default(0);
            $table->timestamps();
        });

        // 8. Create request limit rules (depends on departments, staff, and supply_items)
        Schema::create('request_limit_rules', function (Blueprint $table) {
            $table->id('rule_id');
            $table->foreignId('department_id')->constrained('departments', 'department_id')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('supply_items', 'item_id')->onDelete('cascade');
            $table->integer('limit_quantity');
            $table->string('rule_type');
            $table->timestamps();
        });

        // 9. Create request logs (depends on supply_requests and staff)
        Schema::create('request_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->foreignId('request_id')->constrained('supply_requests', 'request_id')->onDelete('cascade');
            $table->string('action_type');
            $table->dateTime('action_date');
            $table->foreignId('performed_by')->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_logs');
        Schema::dropIfExists('request_limit_rules');
        Schema::dropIfExists('request_details');
        Schema::dropIfExists('supply_requests');
        Schema::dropIfExists('request_statuses');
        Schema::dropIfExists('supply_items');
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('departments');
    }
};
