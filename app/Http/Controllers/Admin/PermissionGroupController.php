<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionGroupRequest;
use App\Models\PermissionGroup;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface as PermissionGroupRepository;

class PermissionGroupController extends Controller
{
    public function __construct(PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.permission_group.index', [
            'permissionGroups' => $this->permissionGroupRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.permission_group.create');
    }

    public function store(PermissionGroupRequest $request)
    {
        $this->permissionGroupRepository->save($request->validated());

        return redirect()->route('admin.permission_group.index');
    }

    public function show(PermissionGroup $permissionGroup)
    {
        return view('admin.permission_group.show', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function edit(PermissionGroup $permissionGroup)
    {
        return view('admin.permission_group.edit', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function update(PermissionGroupRequest $request, PermissionGroup $permissionGroup)
    {
        $this->permissionGroupRepository->save($request->validated(), ['id' => $permissionGroup->id]);

        return redirect()->route('admin.permission_group.index');
    }

    public function destroy(PermissionGroup $permissionGroup)
    {
        $this->permissionGroupRepository->deleteById($permissionGroup->id);

        return redirect()->route('admin.permission_group.index');
    }
}
