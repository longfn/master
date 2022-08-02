<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionRequest;
use App\Repositories\Admin\Permission\PermissionRepositoryInterface as PermissionRepository;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface as PermissionGroupRepository;

class PermissionController extends Controller
{
    protected $permissionRepository;
    protected $permissionGroupRepository;

    public function __construct(PermissionRepository $permissionRepository, PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.permission.index', [
            'permissions' => $this->permissionRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.permission.create', [
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function store(PermissionRequest $request)
    {
        $this->permissionRepository->save($request->validated());

        return redirect()->route('admin.permission.index');
    }

    public function show($id)
    {
        return view('admin.permission.show', [
            'permission' => $this->permissionRepository->findById($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.permission.edit', [
            'permission' => $this->permissionRepository->findById($id),
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function update(PermissionRequest $request, $id)
    {
        $this->permissionRepository->save($request->validated(), ['id' => $id]);

        return redirect()->route('admin.permission.index');
    }

    public function destroy($id)
    {
        $this->permissionRepository->deleteById($id);

        return redirect()->route('admin.permission.index');
    }
}
