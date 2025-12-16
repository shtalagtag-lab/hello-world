<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Account;
use App\Models\SupplyItem;
use App\Models\RequestStatus;
use App\Models\SupplyRequest;
use App\Models\RequestDetail;
use App\Models\RequestLimitRule;
use App\Models\RequestLog;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Departments
        $dept_it = Department::create([
            'department_name' => 'Information Technology',
        ]);

        $dept_hr = Department::create([
            'department_name' => 'Human Resources',
        ]);

        $dept_finance = Department::create([
            'department_name' => 'Finance',
        ]);

        $dept_ops = Department::create([
            'department_name' => 'Operations',
        ]);

        // Create Staff
        $staff_john = Staff::create([
            'name' => 'John Smith',
            'department_id' => $dept_it->department_id,
            'role' => 'Manager',
        ]);

        $staff_mary = Staff::create([
            'name' => 'Mary Johnson',
            'department_id' => $dept_hr->department_id,
            'role' => 'Specialist',
        ]);

        $staff_robert = Staff::create([
            'name' => 'Robert Brown',
            'department_id' => $dept_finance->department_id,
            'role' => 'Analyst',
        ]);

        $staff_sarah = Staff::create([
            'name' => 'Sarah Williams',
            'department_id' => $dept_ops->department_id,
            'role' => 'Coordinator',
        ]);

        $staff_james = Staff::create([
            'name' => 'James Miller',
            'department_id' => $dept_it->department_id,
            'role' => 'Technician',
        ]);

        // Create Accounts
        Account::create([
            'staff_id' => $staff_john->staff_id,
            'user_name' => 'jsmith',
            'password' => bcrypt('password123'),
        ]);

        Account::create([
            'staff_id' => $staff_mary->staff_id,
            'user_name' => 'mjohnson',
            'password' => bcrypt('password123'),
        ]);

        Account::create([
            'staff_id' => $staff_robert->staff_id,
            'user_name' => 'rbrown',
            'password' => bcrypt('password123'),
        ]);

        Account::create([
            'staff_id' => $staff_sarah->staff_id,
            'user_name' => 'swilliams',
            'password' => bcrypt('password123'),
        ]);

        Account::create([
            'staff_id' => $staff_james->staff_id,
            'user_name' => 'jmiller',
            'password' => bcrypt('password123'),
        ]);

        // Create Supply Items
        $item_monitor = SupplyItem::create([
            'name' => 'Monitor (27 inch)',
            'category' => 'Electronics',
            'quantity_in_stock' => 15,
        ]);

        $item_keyboard = SupplyItem::create([
            'name' => 'Keyboard (Mechanical)',
            'category' => 'Electronics',
            'quantity_in_stock' => 25,
        ]);

        $item_mouse = SupplyItem::create([
            'name' => 'Mouse (Wireless)',
            'category' => 'Electronics',
            'quantity_in_stock' => 30,
        ]);

        $item_paper = SupplyItem::create([
            'name' => 'Paper (A4, 500 sheets)',
            'category' => 'Office Supplies',
            'quantity_in_stock' => 50,
        ]);

        $item_pen = SupplyItem::create([
            'name' => 'Pen (Blue, Pack of 10)',
            'category' => 'Office Supplies',
            'quantity_in_stock' => 100,
        ]);

        $item_chair = SupplyItem::create([
            'name' => 'Office Chair (Ergonomic)',
            'category' => 'Furniture',
            'quantity_in_stock' => 8,
        ]);

        $item_desk = SupplyItem::create([
            'name' => 'Desk (L-shaped)',
            'category' => 'Furniture',
            'quantity_in_stock' => 5,
        ]);

        $item_ink = SupplyItem::create([
            'name' => 'Printer Ink Cartridge',
            'category' => 'Consumables',
            'quantity_in_stock' => 40,
        ]);

        // Create Request Statuses
        $status_pending = RequestStatus::create([
            'status_name' => 'Pending',
        ]);

        $status_approved = RequestStatus::create([
            'status_name' => 'Approved',
        ]);

        $status_rejected = RequestStatus::create([
            'status_name' => 'Rejected',
        ]);

        $status_completed = RequestStatus::create([
            'status_name' => 'Completed',
        ]);

        // Create Supply Requests
        $request_1 = SupplyRequest::create([
            'staff_id' => $staff_john->staff_id,
            'request_date' => now()->subDays(5),
            'purpose' => 'New equipment for IT team expansion',
            'status_id' => $status_approved->status_id,
        ]);

        $request_2 = SupplyRequest::create([
            'staff_id' => $staff_mary->staff_id,
            'request_date' => now()->subDays(3),
            'purpose' => 'Office supplies for HR department',
            'status_id' => $status_approved->status_id,
        ]);

        $request_3 = SupplyRequest::create([
            'staff_id' => $staff_robert->staff_id,
            'request_date' => now()->subDays(1),
            'purpose' => 'Furniture for new finance office',
            'status_id' => $status_pending->status_id,
        ]);

        $request_4 = SupplyRequest::create([
            'staff_id' => $staff_sarah->staff_id,
            'request_date' => now(),
            'purpose' => 'Consumables for operations department',
            'status_id' => $status_pending->status_id,
        ]);

        // Create Request Details
        RequestDetail::create([
            'request_id' => $request_1->request_id,
            'item_id' => $item_monitor->item_id,
            'quantity_requested' => 3,
            'quantity_issued' => 3,
        ]);

        RequestDetail::create([
            'request_id' => $request_1->request_id,
            'item_id' => $item_keyboard->item_id,
            'quantity_requested' => 3,
            'quantity_issued' => 3,
        ]);

        RequestDetail::create([
            'request_id' => $request_1->request_id,
            'item_id' => $item_mouse->item_id,
            'quantity_requested' => 3,
            'quantity_issued' => 3,
        ]);

        RequestDetail::create([
            'request_id' => $request_2->request_id,
            'item_id' => $item_paper->item_id,
            'quantity_requested' => 10,
            'quantity_issued' => 10,
        ]);

        RequestDetail::create([
            'request_id' => $request_2->request_id,
            'item_id' => $item_pen->item_id,
            'quantity_requested' => 5,
            'quantity_issued' => 5,
        ]);

        RequestDetail::create([
            'request_id' => $request_3->request_id,
            'item_id' => $item_chair->item_id,
            'quantity_requested' => 4,
            'quantity_issued' => 0,
        ]);

        RequestDetail::create([
            'request_id' => $request_3->request_id,
            'item_id' => $item_desk->item_id,
            'quantity_requested' => 2,
            'quantity_issued' => 0,
        ]);

        RequestDetail::create([
            'request_id' => $request_4->request_id,
            'item_id' => $item_ink->item_id,
            'quantity_requested' => 6,
            'quantity_issued' => 0,
        ]);

        // Create Request Limit Rules
        RequestLimitRule::create([
            'department_id' => $dept_it->department_id,
            'staff_id' => $staff_john->staff_id,
            'item_id' => $item_monitor->item_id,
            'limit_quantity' => 5,
            'rule_type' => 'Monthly',
        ]);

        RequestLimitRule::create([
            'department_id' => $dept_it->department_id,
            'staff_id' => $staff_james->staff_id,
            'item_id' => $item_keyboard->item_id,
            'limit_quantity' => 3,
            'rule_type' => 'Monthly',
        ]);

        RequestLimitRule::create([
            'department_id' => $dept_hr->department_id,
            'staff_id' => $staff_mary->staff_id,
            'item_id' => $item_paper->item_id,
            'limit_quantity' => 20,
            'rule_type' => 'Monthly',
        ]);

        RequestLimitRule::create([
            'department_id' => $dept_finance->department_id,
            'staff_id' => $staff_robert->staff_id,
            'item_id' => $item_pen->item_id,
            'limit_quantity' => 10,
            'rule_type' => 'Quarterly',
        ]);

        RequestLimitRule::create([
            'department_id' => $dept_ops->department_id,
            'staff_id' => $staff_sarah->staff_id,
            'item_id' => $item_chair->item_id,
            'limit_quantity' => 2,
            'rule_type' => 'Annually',
        ]);

        // Create Request Logs
        RequestLog::create([
            'request_id' => $request_1->request_id,
            'action_type' => 'Created',
            'action_date' => $request_1->request_date,
            'performed_by' => $staff_john->staff_id,
        ]);

        RequestLog::create([
            'request_id' => $request_1->request_id,
            'action_type' => 'Approved',
            'action_date' => $request_1->request_date->addDays(1),
            'performed_by' => $staff_john->staff_id,
        ]);

        RequestLog::create([
            'request_id' => $request_1->request_id,
            'action_type' => 'Issued',
            'action_date' => $request_1->request_date->addDays(2),
            'performed_by' => $staff_james->staff_id,
        ]);

        RequestLog::create([
            'request_id' => $request_2->request_id,
            'action_type' => 'Created',
            'action_date' => $request_2->request_date,
            'performed_by' => $staff_mary->staff_id,
        ]);

        RequestLog::create([
            'request_id' => $request_2->request_id,
            'action_type' => 'Approved',
            'action_date' => $request_2->request_date->addDays(1),
            'performed_by' => $staff_mary->staff_id,
        ]);

        RequestLog::create([
            'request_id' => $request_3->request_id,
            'action_type' => 'Created',
            'action_date' => $request_3->request_date,
            'performed_by' => $staff_robert->staff_id,
        ]);

        RequestLog::create([
            'request_id' => $request_4->request_id,
            'action_type' => 'Created',
            'action_date' => $request_4->request_date,
            'performed_by' => $staff_sarah->staff_id,
        ]);
    }
}
