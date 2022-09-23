<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(100);

        return UserResource::collection($users);
        
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
        $user = new User();


        
        $data = $request;
        //$data = json_decode($request->data);

        $user->name = $data->name;
        $user->email = $data->email;
        $user->telephone = $data->telephone;
        $user->role = $data->role;
        $user->state = $data->state;
        $user->id_store = $data->id_store;
        
        // $thumbnail = UploadController::upload($request);
        // $user->thumbnail = $thumbnail[0];
        //$image = UploadController::upload($request);
        
        // //$images = $request->file('image');



        if($user->save()){
            return new UserResource($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function UsersStrore(int $id_store){
        $user = User::where('id_store', $id_store)->paginate(10);

        return  UserResource::collection($user);
    }

    public function UsersProvider(int $id_provider){
        $user = User::where('id_provider', $id_provider)->paginate(10);
        return UserResource::collection($user);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->role = $request->role;
        $user->state = $request->state;
        $user->id_store = $request->id_store;

        // $thumbnail = UploadController::upload($request);
        // $user->thumbnail = $thumbnail[0];
        
        if($user->save()){
            return new UserResource($user);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        if($User->delete()){
            return new UserResource($User);
        }
    }
}
