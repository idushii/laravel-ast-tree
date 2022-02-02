<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceItemUpdateRequest;
use App\Http\Resources\ServiceItemCollection;
use App\Http\Resources\ServiceItemResource;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ServiceItemCollection
     */
    public function index(Request $request)
    {
        $serviceItems = ServiceItem::all();

        return new ServiceItemCollection($serviceItems);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceItem $serviceItem
     * @return \App\Http\Resources\ServiceItemResource
     */
    public function show(Request $request, ServiceItem $serviceItem)
    {
        return new ServiceItemResource($serviceItem);
    }

    /**
     * @param \App\Http\Requests\ServiceItemUpdateRequest $request
     * @param \App\Models\ServiceItem $serviceItem
     * @return \App\Http\Resources\ServiceItemResource
     */
    public function update(ServiceItemUpdateRequest $request, ServiceItem $serviceItem)
    {
        $serviceItem->update($request->validated());

        return new ServiceItemResource($serviceItem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceItem $serviceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ServiceItem $serviceItem)
    {
        $serviceItem->delete();

        return response()->noContent();
    }
}
