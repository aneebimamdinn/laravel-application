<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\NotifyUser;
use App\Notifications\NotifyUserDelete;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $users = User::paginate();
        $res = ['status'=>200,'response'=>$users];
        return $res;
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
     * @param  App\Http\Requests\StoreUserRequest  $request
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $file = $request->file('photo');
        if(!empty($file)){
            $destinationPath = public_path().'/uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        $user = User::create($request->validated());
        $user->notify(new NotifyUser($user));
        $res = ['status'=>200,'message'=>"User saved"];
        return $res;
        

    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
        $res = ['status'=>200,'response'=>$user];
        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUserRequest  $request
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $file = $request->file('photo');
        if(!empty($file)){
            $destinationPath = public_path().'/uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        $user->fill($request->validated());
        $user->update();
        $res = ['status'=>200,'message'=>"User updated"];
        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        // use eloquent event
        $user->notify(new NotifyUserDelete($user));
        $res = ['status'=>200,'response'=>"User deleted"];
        return $res;
    }
}
