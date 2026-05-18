<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        return view('admin.role.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);
        Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.roles.index')
            ->with('success', 'Role berhasil ditambahkan');
    }
    public function edit(int $id)
    {
        $role = Role::findOrFail($id);

        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role berhasil dihapus');
    }
    public function permission(int $id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        return view('admin.role.permission', compact('role', 'permissions'));
    }

    public function permissionStore(Request $request, int $id)
    {
        $role = Role::findOrFail($id);

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Permission berhasil ditambahkan');
    }
}
