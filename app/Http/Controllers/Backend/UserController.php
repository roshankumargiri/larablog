<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\User;
use App\Role;
use Auth;
use Intervention\Image\Facades\Image;


class UserController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate($this->limit);
        $userCount = User::count();
        return view('backend.user.index', compact('users', 'userCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->slug = $request->slug;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->bio = $request->bio;


        $user->gavatar = "test image";



        $user->save();

        //dd($request->role);
        $user->attachRole($request->role);
        return redirect('/backend/user')->with('message', 'User successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->slug = $request->slug;
        $user->bio = $request->bio;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->gavatar = "test";
        $user->save();
        $user->detachRoles();
        $user->attachRole($request->role);


        return redirect('/backend/user')->with('message', 'User successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect('/backend/user')->with('error-message', 'Super User cannot be Deleted');
        } elseif ($id == Auth::user()->id) {
            return redirect('/backend/user')->with('error-message', 'Current User cannot be Deleted');
        }
        $deluser = User::FindOrFail($id);
        $users = User::all();
        return view('backend.user.deleteform', compact('users', 'deluser'));
    }
    public function confirmdelete(Request $request, $id)
    {
        if ($id == 1) {
            return redirect('/backend/user')->with('error-message', 'Super User cannot be Deleted');
        } elseif ($id == Auth::user()->id) {
            return redirect('/backend/user')->with('error-message', 'Current User cannot be Deleted');
        }
        $olduser = User::findOrFail($id);

        if ($request->newuser == 'none') {
            Post::where('user_id', "=", $olduser->id)
                ->delete();
            User::findOrFail($olduser->id)->delete();
        } else {
            $user = User::findOrFail($request->newuser);
            Post::where('user_id', "=", $olduser->id)
                ->update([
                    'user_id' => $user->id,
                ]);
            User::findOrFail($olduser->id)->delete();
        }
        return redirect('/backend/user')->with('message', 'User successfully Deleted');
    }
    public function changeimage($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.changeimage', compact('user'));
    }
    public function updateimage(Request $request, $id)
    {
        //dd($request);
        $user = User::findOrFail($id);
        if ($request->hasFile('image')) {
            //dd("image received");
            $image = $request->file('image');
            $fileName = $user->slug . rand(10, 99) . '.' . $image->getClientOriginalExtension();
            $destination = public_path('img');
            $successUploaded = $image->move($destination, $fileName);
            if ($successUploaded) {
                $thumbnail = "thumb_" . $fileName;
                Image::make($destination . '/' . $fileName)->resize(800, 450)->save($destination . '/' . $thumbnail);
            }
            $user->gavatar = $fileName;
        }
        $user->save();
        return redirect('/home')->with('message', 'Profile image changed successfully');
    }
}
