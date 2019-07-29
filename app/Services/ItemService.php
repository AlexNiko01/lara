<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.07.19
 * Time: 20:09
 */

namespace App\Services;


use App\Http\Resources\ItemResourse;
use App\Item;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function getAll(): AnonymousResourceCollection
    {
        return ItemResourse::collection(Item::all());
    }

    /**
     * @param array $validated
     * @return ItemResourse
     */
    public function store(array $validated): ItemResourse
    {
        $resourse = new ItemResourse(Item::create($validated));
        return $resourse;
    }

    /**
     * @param $id
     * @return ItemResourse
     */
    public function show($id): ItemResourse
    {
        return new ItemResourse(Item::findOrFail($id));
    }

    /**
     * @param array $validated
     * @param $id
     * @return ItemResourse
     */
    public function update(array $validated, $id): ItemResourse
    {
        Item::findOrFail($id)->fill($validated)->save();
        $resourse = new ItemResourse(Item::findOrFail($id));
        return $resourse;
    }

    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        return $item->delete();

    }
}
