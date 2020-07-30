<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permissions.index', ['permissions' => Permission::all()]);
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
    public function store()
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);
        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::slug(request('name'), '-')
        ]);
        request()->session()->flash('success', 'The permission mame: ' . request('name') . ' was create');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',[
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::slug(request('name'), '-');
        //isDirty() detect has changes
        //isClean() is nathing change
        if ($permission->isDirty('name')) {

            $permission->save();
            request()->session()->flash('success', 'The permission name: ' . $permission->name . ' was updated');
        }else{
            request()->session()->flash('success', 'Nothing  has been updated');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        request()->session()->flash('message', 'The permission name: ' . $permission->name . ' was deleted');
        return back();
    }
}
