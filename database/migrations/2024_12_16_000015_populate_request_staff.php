<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Get all staff
        $staffList = DB::table('staff')->pluck('staff_id')->toArray();
        
        if (empty($staffList)) {
            return; // No staff to assign
        }

        // Get all requests without staff assignment
        $requests = DB::table('supply_requests')->get();
        
        foreach ($requests as $request) {
            $staffId = $staffList[0]; // Assign first staff member
            
            // Check if assignment already exists
            $exists = DB::table('request_staff')->where([
                'request_id' => $request->request_id,
                'staff_id' => $staffId,
            ])->exists();
            
            if (!$exists) {
                DB::table('request_staff')->insert([
                    'request_id' => $request->request_id,
                    'staff_id' => $staffId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        // Clear all request_staff assignments
        DB::table('request_staff')->truncate();
    }
};
