<?php

namespace App\Http\Controllers;

use App\Models\RequestDetail;
use App\Models\SupplyRequest;
use App\Models\SupplyItem;
use Illuminate\Http\Request;

class RequestDetailController extends Controller
{
    public function index()
    {
        $details = RequestDetail::with('request', 'item')->get();
        return view('request-details.index', compact('details'));
    }

    public function create()
    {
        $requests = SupplyRequest::all();
        $items = SupplyItem::all();
        $requestId = request('request_id');
        return view('request-details.create', compact('requests', 'items', 'requestId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'request_id' => 'required|exists:supply_requests,request_id',
            'item_id' => 'required|exists:supply_items,item_id',
            'quantity_requested' => 'required|integer|min:1',
            'quantity_issued' => 'required|integer|min:0',
        ]);

        RequestDetail::create($validated);
        
        $requestId = $validated['request_id'];
        return redirect()->route('supply-requests.show', $requestId)->with('success', 'Request detail added successfully.');
    }

    public function show(RequestDetail $requestDetail)
    {
        $requestDetail->load('request', 'item');
        return view('request-details.show', compact('requestDetail'));
    }

    public function edit(RequestDetail $requestDetail)
    {
        $requests = SupplyRequest::all();
        $items = SupplyItem::all();
        $returnTo = request('return_to', 'request-details.index');
        return view('request-details.edit', compact('requestDetail', 'requests', 'items', 'returnTo'));
    }

    public function update(Request $request, RequestDetail $requestDetail)
    {
        $validated = $request->validate([
            'request_id' => 'required|exists:supply_requests,request_id',
            'item_id' => 'required|exists:supply_items,item_id',
            'quantity_requested' => 'required|integer|min:1',
            'quantity_issued' => 'required|integer|min:0',
        ]);

        $requestDetail->update($validated);
        
        $requestId = $validated['request_id'];
        return redirect()->route('supply-requests.show', $requestId)->with('success', 'Request detail updated successfully.');
    }

    public function destroy(RequestDetail $requestDetail)
    {
        $requestId = $requestDetail->request_id;
        $requestDetail->delete();
        return redirect()->route('supply-requests.show', $requestId)->with('success', 'Request detail deleted successfully.');
    }
}
