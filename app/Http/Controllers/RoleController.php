<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use App\Models\Admin;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        // dd(Auth::user()->hasRole('admin'));
        // $roles = Role::where('name', '!=', 'admin')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $setting_permissions = Permission::where('permission_type', 'Settings')->get();
        $insurance_permissions = Permission::where('permission_type', 'Insurance')->get();
        $freight_permissions = Permission::where('permission_type', 'Freight')->get();
        $inspection_permissions = Permission::where('permission_type', 'Inspection')->get();
        $offer_management_permissions = Permission::where('permission_type', 'Offer_Management')->get();
        $permissions = Permission::where('permission_type', 'Permission')->get();
        $roles = Permission::where('permission_type', 'Roles')->get();
        $users = Permission::where('permission_type', 'Users')->get();
        $page_settings = Permission::where('permission_type', 'Page_settings')->get();
        $listing_settings = Permission::where('permission_type', 'Listing')->get();
        $advertisements = Permission::where('permission_type', 'Advertisement')->get();
        $option_services = Permission::where('permission_type', 'Option Service')->get();
        $shippment = Permission::where('permission_type', 'Shipping')->get();
         
        return view('roles.create', compact('shippment','option_services','advertisements','listing_settings','page_settings','users','roles','setting_permissions','insurance_permissions','freight_permissions','inspection_permissions','offer_management_permissions', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles',
            'permissions' => 'nullable|array',
        ]);
        
        $role = Role::create(['name' => $request->input('name'),'guard_name' => 'admin']);
        
        if ($request->has('permissions')) {
            $role->syncPermissions($request->input('permissions'));
        }
        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        $setting_permissions = Permission::where('permission_type', 'Settings')->get();
        $insurance_permissions = Permission::where('permission_type', 'Insurance')->get();
        $freight_permissions = Permission::where('permission_type', 'Freight')->get();
        $inspection_permissions = Permission::where('permission_type', 'Inspection')->get();
        $offer_management_permissions = Permission::where('permission_type', 'Offer_Management')->get();
        $permissions = Permission::where('permission_type', 'Permission')->get();
        $roles = Permission::where('permission_type', 'Roles')->get();
        $users = Permission::where('permission_type', 'Users')->get();
        $page_settings = Permission::where('permission_type', 'Page_settings')->get();
        $listing_settings = Permission::where('permission_type', 'Listing')->get();
        $advertisements = Permission::where('permission_type', 'Advertisement')->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        $option_services = Permission::where('permission_type', 'Option Service')->get();
        $shippments = Permission::where('permission_type', 'Shipping')->get();
        
        return view('roles.edit', compact('shippments','option_services','advertisements','listing_settings','page_settings','roles','users','role','offer_management_permissions','inspection_permissions', 'freight_permissions', 'insurance_permissions', 'setting_permissions', 'rolePermissions' ,'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
        ]);
        $role->update(['name' => $request->input('name')]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->input('permissions'));
        } else {
            $role->revokePermissionTo($role->permissions);
        }
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

    // Additional method for managing permissions of a role (if needed)
    public function permissions(Role $role)
    {
        $permissions = Permission::all();
        // dd($permissions);
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('roles.permissions', compact('role', 'permissions','rolePermissions'));
    }

    public function updatePermissions(Request $request, Role $role)
    {
        $this->validate($request, [
            'permissions' => 'nullable|array',
        ]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->input('permissions'));
        } else {
            $role->revokePermissionTo($role->permissions);
        }

        return redirect()->route('roles.index')
            ->with('success', 'Permissions updated for ' . $role->name);
    }
}
