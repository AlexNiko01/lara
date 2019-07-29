<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResourse;
use App\Services\ItemService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemController extends Controller
{
    /**
     * @var ItemService
     */
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return $this->itemService->getAll();
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
        return $this->itemService->store($validated);
    }

    /**
     * @param $id
     * @return ItemResourse
     */
    public function show($id)
    {
        return $this->itemService->show($id);
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
        return $this->itemService->update($validated, $id);
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->itemService->destroy($id);
    }
}
