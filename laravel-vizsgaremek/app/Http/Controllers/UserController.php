<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShowUserByNameRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Http\Resources\UserResourceAdmin;

class UserController extends Controller
{
    public function index($id) {
        $data = User::findOrFail($id);
        return view('profile', [
            'title' => "$data->name's profile",
            'username' => $data->name,
            'userId' => $data->id,
            'pfp' => $data->getProfilePictureURI(),
            'products' => $data->productsConnection,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return new UserResourceAdmin($user);
    }

    public function showByName(ShowUserByNameRequest $request){
        $data = $request->validated();
        $users = User::where('name', 'like', '%' . $data['name'] . '%')->get();
        $resources = [];
        foreach ($users as $user) {
            $resources[] = new UserResourceAdmin($user);
        }
        return $resources;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::findOrFail($id);
        $user->update($data);
        return new UserResourceAdmin($user);
    }

    public function profilePictureUpdate(Request $request){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
