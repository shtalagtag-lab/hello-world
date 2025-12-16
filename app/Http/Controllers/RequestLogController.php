<?php

namespace App\Http\Controllers;

use App\Models\RequestLog;
use App\Models\SupplyRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

class RequestLogController extends Controller
{
    public function index()
    {
        $logs = RequestLog::with('request', 'performer')->get();
        return view('request-logs.index', compact('logs'));
    }

    public function create()
    {
        $requests = SupplyRequest::all();
        $staff = Staff::all();
        return view('request-logs.create', compact('requests', 'staff'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'request_id' => 'required|exists:supply_requests,request_id',
            'action_type' => 'required|string',
            'action_date' => 'required|date_format:Y-m-d H:i',
            'performed_by' => 'required|exists:staff,staff_id',
        ]);

        RequestLog::create($validated);

        return redirect()->route('request-logs.index')->with('success', 'Request log created successfully.');
    }

    public function show(RequestLog $requestLog)
    {
        $requestLog->load('request', 'performer');
        return view('request-logs.show', compact('requestLog'));
    }

    public function edit(RequestLog $requestLog)
    {
        $requests = SupplyRequest::all();
        $staff = Staff::all();
        return view('request-logs.edit', compact('requestLog', 'requests', 'staff'));
    }

    public function update(Request $request, RequestLog $requestLog)
    {
        $validated = $request->validate([
            'request_id' => 'required|exists:supply_requests,request_id',
            'action_type' => 'required|string',
            'action_date' => 'required|date_format:Y-m-d H:i',
            'performed_by' => 'required|exists:staff,staff_id',
        ]);

        $requestLog->update($validated);

        return redirect()->route('request-logs.index')->with('success', 'Request log updated successfully.');
    }

    public function destroy(RequestLog $requestLog)
    {
        $requestLog->delete();
        return redirect()->route('request-logs.index')->with('success', 'Request log deleted successfully.');
    }
}
