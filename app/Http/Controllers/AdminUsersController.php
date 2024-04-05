<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminUsersController extends Controller
{
    public function index()
    {
        // $admins = Admin::all();
        $admins = Admin::with('roles')->get();
        return view('admin_users.index', compact('admins'));
    }

    public function create()
    {
        $roles= Role::all();
        return view('admin_users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        // Validation can be added here
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->token = Str::random(40);
        // $admin->photo = $request->input('photo');
        $admin->photo = 'path/to/photo.jpg';
        $admin->status = $request->input('status');
        $admin->save(); 
        // Retrieve the selected role from the form and associate it with the admin user
        $role = Role::find($request->input('role'));
        if ($role) {
            $role->guard_name = 'admin';
            $role->save();
            $admin->roles()->attach($role);
        }
        return redirect()->route('admin_users.index')->with('success', 'Admin user created successfully');
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin_users.show', compact('admin'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        $admin = Admin::find($id);
        return view('admin_users.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Validation can be added here

        $admin = Admin::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        // Update the password only if it's provided
        if ($request->has('password')) {
            $admin->password = Hash::make($request->input('password'));
        }

        // Update the role of the admin user
        $admin->roles()->sync([$request->input('role')]); // Assuming a many-to-many relationship between Admin and Role

        $admin->status = $request->input('status');
        $admin->save();

        return redirect()->route('admin_users.index')->with('success', 'Admin user updated successfully');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admin_users.index')->with('success', 'Admin user deleted successfully');
    }
}
