<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\ShowUserByNameRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Http\Resources\UserResourceAdmin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function index($id) {
        $data = User::findOrFail($id);
        $manager = new ImageManager(['driver' => 'imagick']);
        $pfpPath = Str::remove(env('APP_URL').'/', $data->getProfilePictureURI());
        $pfp = $manager->make(storage_path("app/$pfpPath"));
        $pfp->fit(300);
        $pfp->save(storage_path('app/profile_pictures/pfp.png'));
        return view('profile.index', [
            'title' => "$data->name's profile",
            'user' => $data,
            'pfp' => env('APP_URL').'/profile_pictures/pfp.png',
            'products' => $data->productsConnection,
        ]);
    }

    public function dashboard($id) {
        Gate::authorize('view-dashboard', $id);
        $data = User::findOrFail($id);
        return view('profile.dashboard', [
            'title' => "$data->name's dashboard",
            'user' => $data,
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
