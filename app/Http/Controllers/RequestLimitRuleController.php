<?php

namespace App\Http\Controllers;

use App\Models\RequestLimitRule;
use App\Models\Department;
use App\Models\Staff;
use App\Models\SupplyItem;
use Illuminate\Http\Request;

class RequestLimitRuleController extends Controller
{
    public function index()
    {
        $rules = RequestLimitRule::with('department', 'staff', 'item')->get();
        return view('request-limit-rules.index', compact('rules'));
    }

    public function create()
    {
        $departments = Department::all();
        $staff = Staff::all();
        $items = SupplyItem::all();
        return view('request-limit-rules.create', compact('departments', 'staff', 'items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,department_id',
            'staff_id' => 'required|exists:staff,staff_id',
            'item_id' => 'required|exists:supply_items,item_id',
            'limit_quantity' => 'required|integer|min:1',
            'rule_type' => 'required|string',
        ]);

        RequestLimitRule::create($validated);

        return redirect()->route('request-limit-rules.index')->with('success', 'Request limit rule created successfully.');
    }

    public function show(RequestLimitRule $requestLimitRule)
    {
        $requestLimitRule->load('department', 'staff', 'item');
        return view('request-limit-rules.show', compact('requestLimitRule'));
    }

    public function edit(RequestLimitRule $requestLimitRule)
    {
        $departments = Department::all();
        $staff = Staff::all();
        $items = SupplyItem::all();
        return view('request-limit-rules.edit', compact('requestLimitRule', 'departments', 'staff', 'items'));
    }

    public function update(Request $request, RequestLimitRule $requestLimitRule)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,department_id',
            'staff_id' => 'required|exists:staff,staff_id',
            'item_id' => 'required|exists:supply_items,item_id',
            'limit_quantity' => 'required|integer|min:1',
            'rule_type' => 'required|string',
        ]);

        $requestLimitRule->update($validated);

        return redirect()->route('request-limit-rules.index')->with('success', 'Request limit rule updated successfully.');
    }

    public function destroy(RequestLimitRule $requestLimitRule)
    {
        $requestLimitRule->delete();
        return redirect()->route('request-limit-rules.index')->with('success', 'Request limit rule deleted successfully.');
    }
}
