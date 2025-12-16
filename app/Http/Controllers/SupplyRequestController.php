<?php

namespace App\Http\Controllers;

use App\Models\SupplyRequest;
use App\Models\Staff;
use App\Models\RequestStatus;
use Illuminate\Http\Request;

class SupplyRequestController extends Controller
{
    public function index()
    {
        $requests = SupplyRequest::with('staff', 'status')->get();
        return view('supply-requests.index', compact('requests'));
    }

    public function create()
    {
        $staff = Staff::all();
        $statuses = RequestStatus::all();
        return view('supply-requests.create', compact('staff', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_ids' => 'required|array|min:1',
            'staff_ids.*' => 'exists:staff,staff_id',
            'request_date' => 'required|date',
            'purpose' => 'required|string',
            'status_id' => 'required|exists:request_statuses,status_id',
        ]);

        $supplyRequest = SupplyRequest::create([
            'request_date' => $validated['request_date'],
            'purpose' => $validated['purpose'],
            'status_id' => $validated['status_id'],
        ]);
        
        $supplyRequest->staff()->attach($validated['staff_ids']);

        return redirect()->route('supply-requests.index')->with('success', 'Supply request created successfully.');
    }

    public function show(SupplyRequest $supplyRequest)
    {
        $supplyRequest->load('staff', 'status', 'details.item');
        return view('supply-requests.show', compact('supplyRequest'));
    }

    public function edit(SupplyRequest $supplyRequest)
    {
        $staff = Staff::all();
        $statuses = RequestStatus::all();
        return view('supply-requests.edit', compact('supplyRequest', 'staff', 'statuses'));
    }

    public function update(Request $request, SupplyRequest $supplyRequest)
    {
        $validated = $request->validate([
            'staff_ids' => 'required|array|min:1',
            'staff_ids.*' => 'exists:staff,staff_id',
            'request_date' => 'required|date',
            'purpose' => 'required|string',
            'status_id' => 'required|exists:request_statuses,status_id',
        ]);

        $supplyRequest->update([
            'request_date' => $validated['request_date'],
            'purpose' => $validated['purpose'],
            'status_id' => $validated['status_id'],
        ]);
        
        $supplyRequest->staff()->sync($validated['staff_ids']);

        return redirect()->route('supply-requests.index')->with('success', 'Supply request updated successfully.');
    }

    public function destroy(SupplyRequest $supplyRequest)
    {
        $supplyRequest->delete();
        return redirect()->route('supply-requests.index')->with('success', 'Supply request deleted successfully.');
    }
}
