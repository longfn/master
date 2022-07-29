<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;

class PermissionGroupController extends Controller
{
    public function index()
    {
        return view('admin.permission_group.index', [
            'permissionGroups' => PermissionGroup::all(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(PermissionGroup $permissionGroup)
    {
        //
    }

    public function edit(PermissionGroup $permissionGroup)
    {
        //
    }

    public function update(Request $request, PermissionGroup $permissionGroup)
    {
        //
    }

    public function destroy(PermissionGroup $permissionGroup)
    {
        //
    }
}
