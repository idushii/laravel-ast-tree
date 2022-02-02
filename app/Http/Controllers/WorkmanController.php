<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkmanUpdateRequest;
use App\Http\Resources\WorkmanResource;
use App\Models\Workman;
use Illuminate\Http\Request;

class WorkmanController extends Controller
{
    /**
     * @param \App\Http\Requests\WorkmanUpdateRequest $request
     * @param \App\Models\Workman $workman
     * @return \App\Http\Resources\WorkmanResource
     */
    public function update(WorkmanUpdateRequest $request, Workman $workman)
    {
        $workman->update($request->validated());

        return new WorkmanResource($workman);
    }
}
