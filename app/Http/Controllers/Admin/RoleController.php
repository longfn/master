<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface as PermissionGroupRepository;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $permissionGroupRepository;

    public function __construct(RoleRepository $roleRepository, PermissionGroupRepository $permissionGroupRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.role.index', [
            'roles' => $this->roleRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.role.form', [
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function store(RoleRequest $request)
    {
        $role = $this->roleRepository->save($request->validated());
        $role->permissions()->sync($request->input('permission_ids'));

        return redirect()->route('admin.role.index');
    }

    public function show($id)
    {
        return view('admin.role.show', [
            'role' => $this->roleRepository->findById($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.role.form', [
            'role' => $this->roleRepository->findById($id),
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function update(RoleRequest $request, $id)
    {
        $role = $this->roleRepository->save($request->validated(), ['id' => $id]);
        $role->permissions()->sync($request->input('permission_ids'));

        return redirect()->route('admin.role.index');
    }

    public function destroy($id)
    {
        $this->roleRepository->findById($id)->permissions()->detach();
        $this->roleRepository->deleteById($id);

        return redirect()->route('admin.role.index');
    }
}
