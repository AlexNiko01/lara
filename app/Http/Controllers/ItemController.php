<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResourse;
use App\Item;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
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
     * @return ItemResourse
     */
    public function store(StoreItemRequest $request): ItemResourse
    {
        $validated = $request->validated();
        $item = Item::create($validated);
        $resourse = new ItemResourse($item);
        return $resourse;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response(['message' => 'item not found'], 404);
        }
        return response(['data' => $item], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateItemRequest $request
     * @param  int $id
     * @return ItemResourse
     */
    public function update(UpdateItemRequest $request, $id): ItemResourse
    {
        $validated = $request->validated();
        Item::find($id)->fill($validated)->save();
        $resourse = new ItemResourse(Item::find($id));
        return $resourse;
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
        if (!$item) {
            return response(['message' => 'item not found'], 404);
        }
        $item->delete();
        return response(['data' => ['id' => $id]], 200);
    }
}
