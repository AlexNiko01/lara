<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Item::all()], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreItemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $validated = $request->validated();
        $responseData = Item::create($validated);
        return response()->json(['data' => $responseData], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(['data' => Item::find($id)], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreItemRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreItemRequest $request, $id)
    {
        $validated = $request->validated();
        $item = Item::find($id);
        $responseData = $item->fill($validated)->save();
        return response(['data' => $responseData], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if ($item->delete()) {
            return response([], 200);
        };

    }
}
