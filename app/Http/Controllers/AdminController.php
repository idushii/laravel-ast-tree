<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use App\Http\Resources\AdminCollection;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\AdminCollection
     */
    public function index(Request $request)
    {
        $admins = Admin::all();

        return new AdminCollection($admins);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin $admin
     * @return \App\Http\Resources\AdminResource
     */
    public function show(Request $request, Admin $admin)
    {
        return new AdminResource($admin);
    }

    /**
     * @param \App\Http\Requests\AdminUpdateRequest $request
     * @param \App\Models\Admin $admin
     * @return \App\Http\Resources\AdminResource
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $admin->update($request->validated());

        return new AdminResource($admin);
    }
}
