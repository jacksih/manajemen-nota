<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Item::all();
        return view('', compact('items'));
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
    public function store(StoreItemRequest $request)
    {
        //
        $validated = $request->validated();
        if (Item::create($validated)) {
            return back()->with(
                [
                    'success'   =>  'New item created'
                ],
            );
        }
        return back()->with(
            [
                'success'   =>  'New item did not created'
            ],
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
        return view('', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
        return view('', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
        $validated = $request->validated();
        if ($item->update($validated)) {
            return back()->with(
                [
                    'success'   =>  'The item updated'
                ],
            );
        }
        return back()->with(
            [
                'success'   =>  'The item did not updated'
            ],
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
        if ($item->delete()) {
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
