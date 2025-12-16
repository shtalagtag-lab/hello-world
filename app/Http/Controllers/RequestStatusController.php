<?php

namespace App\Http\Controllers;

use App\Models\RequestStatus;
use Illuminate\Http\Request;

class RequestStatusController extends Controller
{
    public function index()
    {
        $statuses = RequestStatus::all();
        return view('request-statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('request-statuses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|unique:request_statuses,status_name',
        ]);

        RequestStatus::create($validated);

        return redirect()->route('request-statuses.index')->with('success', 'Request status created successfully.');
    }

    public function show(RequestStatus $requestStatus)
    {
        return view('request-statuses.show', compact('requestStatus'));
    }

    public function edit(RequestStatus $requestStatus)
    {
        return view('request-statuses.edit', compact('requestStatus'));
    }

    public function update(Request $request, RequestStatus $requestStatus)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|unique:request_statuses,status_name,' . $requestStatus->id,
        ]);

        $requestStatus->update($validated);

        return redirect()->route('request-statuses.index')->with('success', 'Request status updated successfully.');
    }

    public function destroy(RequestStatus $requestStatus)
    {
        $requestStatus->delete();
        return redirect()->route('request-statuses.index')->with('success', 'Request status deleted successfully.');
    }
}
