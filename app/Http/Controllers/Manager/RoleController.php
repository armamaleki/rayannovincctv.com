<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::where('name', 'like', "%{$request->q}%")
            ->orderBy('id', 'DESC')
            ->paginate(100);
        return view('manager.role.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('manager.role.create' , compact('permission'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
            'permission.*' => 'string|exists:permissions,name',
        ]);
        $role = Role::create($data);
        $role->syncPermissions($data['permission']);
        return redirect()->route('manager.role.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        return view('manager.role.edit', compact('role', 'permission'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permission' => 'required|array',
            'permission.*' => 'string|exists:permissions,name',
        ]);
        $role->update([
            'name' => $data['name'],
        ]);
        $role->syncPermissions($data['permission']);
        return redirect()->route('manager.role.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
