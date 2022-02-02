<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectItemUpdateRequest;
use App\Http\Resources\ObjectItemCollection;
use App\Http\Resources\ObjectItemResource;
use App\Models\ObjectItem;
use Illuminate\Http\Request;

class ObjectItemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ObjectItemCollection
     */
    public function index(Request $request)
    {
        $objectItems = ObjectItem::all();

        return new ObjectItemCollection($objectItems);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ObjectItem $objectItem
     * @return \App\Http\Resources\ObjectItemResource
     */
    public function show(Request $request, ObjectItem $objectItem)
    {
        return new ObjectItemResource($objectItem);
    }

    /**
     * @param \App\Http\Requests\ObjectItemUpdateRequest $request
     * @param \App\Models\ObjectItem $objectItem
     * @return \App\Http\Resources\ObjectItemResource
     */
    public function update(ObjectItemUpdateRequest $request, ObjectItem $objectItem)
    {
        $objectItem->update($request->validated());

        return new ObjectItemResource($objectItem);
    }
}
