<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoices = Invoice::all();
        return view('', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
        $validated = $request->validated();
        if (Invoice::create($validated)) {
            return back()->with(
                [
                    'success'   =>  'New invoice created'
                ],
            );
        }
        return back()->with(
            [
                'success'   =>  'New invoice did not created'
            ],
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
        return view('', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
        return view('', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
        $validated = $request->validated();
        if ($invoice->update($validated)) {
            return back()->with(
                [
                    'success'   =>  'The invoice updated'
                ],
            );
        }
        return back()->with(
            [
                'success'   =>  'The invoice did not updated'
            ],
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
        if ($invoice->delete()) {
            return back()->with(
                [
                    'success'   =>  'The item deleted'
                ],
            );
        }
        return back()->with(
            [
                'success'   =>  'The item did not deleted'
            ],
        );
    }
}
