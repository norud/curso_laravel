<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lists() make an array, we pass to the view
        //the oreder of culumn has to be first the name after the id
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //User::create($request->all());
        //return redirect('admin/users');

        $inputs = $request->all();
        if ($file = $request->file('photo_id')) {
            $nameFile = time() . $file->getClientOriginalName();
            $file->move('imgs', $nameFile);
            //first create phto
            $photo = Photo::create(['file' => $nameFile]);
            //we get the photo id
            $inputs['photo_id'] = $photo->id;
        }
        //encrypt pw
        $inputs['password'] = bcrypt($request->password);
        //crate the user
        User::create($inputs);
        Session::flash('success','The user: '.$request->name.' has been created!');
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
       $user = User::find($id);

       if(trim($request->password) == '')
       {
        $inputs = $request->except('password');

       }else{
        $inputs = $request->all();

        $inputs['password'] = bcrypt($request->password);
       }

       if($file = $request->file('photo_id')){
           $nameFile = time().$file->getClientOriginalName();
           $file->move('imgs', $nameFile);

           $photo = Photo::create(['file' => $nameFile]);
           $inputs['photo_id'] = $photo->id;

       }
       Session::flash('success','The user: '.$request->name.' has been updated!');

       $user->update($inputs);

       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::findOrFail($id);
       unlink(public_path() . $user->photo->file);
       $user->delete();

       Session::flash('success','The user has been deleted!');
       return redirect('admin/users');
    }
}
