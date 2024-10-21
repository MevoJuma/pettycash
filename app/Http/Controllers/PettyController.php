<?php

namespace App\Http\Controllers;

use App\Models\PettyCash;
use Illuminate\Http\Request;

class PettyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = PettyCash::all();
        return view("pettycash.create", compact("requests"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'requester_name' => 'required',
        //     'amount' => 'required|numeric',
        //     'reason' => 'required'
        // ]);

        PettyCash::create($request->all());

        return redirect()->back()->with('success', 'Petty Cash request submitted successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pettycash = PettyCash::findOrFail($id);
        return view('edit-petty-cash-request', compact('pettycash'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PettyCash::findOrFail($id)->delete();
        return redirect()->route('pettycash.index')->with('success', 'Request deleted successfully.');
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|string|in:approved,denied',
        ]);

        $pettycash = PettyCash::findOrFail($id);
        $pettycash->status = $request->input('status');
        $pettycash->save();

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
}
