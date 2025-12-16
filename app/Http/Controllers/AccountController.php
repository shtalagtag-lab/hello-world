<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Staff;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with('staff')->get();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        $staff = Staff::all();
        return view('accounts.create', compact('staff'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id' => 'required|exists:staff,staff_id|unique:accounts,staff_id',
            'user_name' => 'required|string|unique:accounts,user_name',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        Account::create($validated);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    public function edit(Account $account)
    {
        $staff = Staff::all();
        return view('accounts.edit', compact('account', 'staff'));
    }

    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'staff_id' => 'required|exists:staff,staff_id|unique:accounts,staff_id,' . $account->account_id,
            'user_name' => 'required|string|unique:accounts,user_name,' . $account->account_id,
            'password' => 'nullable|string|min:6',
        ]);

        if (!$validated['password']) {
            unset($validated['password']);
        } else {
            $validated['password'] = bcrypt($validated['password']);
        }

        $account->update($validated);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
