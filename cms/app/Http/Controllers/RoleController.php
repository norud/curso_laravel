<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', ['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //we can use the leper request() or use the injection store(Request $request)
        request()->validate([
            'name' => 'required|min:3'
        ]);
        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::slug(request('name'), '-')
        ]);
        $request->session()->flash('success', 'The role mame: ' . request('name') . ' was create');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::slug(request('name'), '-');
        //isDirty() detect has changes
        //isClean() is nathing change
        if ($role->isDirty('name')) {

            $role->save();
            request()->session()->flash('success', 'The role name: ' . $role->name . ' was updated');
        }else{
            request()->session()->flash('success', 'Nothing  has been updated');
        }
        return back();
    }
    public function attach_permission(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        request()->session()->flash('message', 'The role name: ' . $role->name . ' was deleted');
        return back();
    }
}
