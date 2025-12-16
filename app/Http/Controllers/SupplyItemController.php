<?php

namespace App\Http\Controllers;

use App\Models\SupplyItem;
use Illuminate\Http\Request;

class SupplyItemController extends Controller
{
    public function index()
    {
        $items = SupplyItem::all();
        return view('supply-items.index', compact('items'));
    }

    public function create()
    {
        return view('supply-items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:supply_items,name',
            'category' => 'required|string',
            'quantity_in_stock' => 'required|integer|min:0',
        ]);

        SupplyItem::create($validated);

        return redirect()->route('supply-items.index')->with('success', 'Supply item created successfully.');
    }

    public function show(SupplyItem $supplyItem)
    {
        return view('supply-items.show', compact('supplyItem'));
    }

    public function edit(SupplyItem $supplyItem)
    {
        return view('supply-items.edit', compact('supplyItem'));
    }

    public function update(Request $request, SupplyItem $supplyItem)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:supply_items,name,' . $supplyItem->id,
            'category' => 'required|string',
            'quantity_in_stock' => 'required|integer|min:0',
        ]);

        $supplyItem->update($validated);

        return redirect()->route('supply-items.index')->with('success', 'Supply item updated successfully.');
    }

    public function destroy(SupplyItem $supplyItem)
    {
        $supplyItem->delete();
        return redirect()->route('supply-items.index')->with('success', 'Supply item deleted successfully.');
    }
}
