<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\ShowByNameRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index($id) {
        $data = User::findOrFail($id);
//        $manager = new ImageManager(['driver' => 'imagick']);
//        $pfpPath = Str::remove(env('APP_URL').'/', $data->getProfilePictureURI());
//        $pfp = $manager->make(storage_path("app/$pfpPath"));
//        $pfp->fit(300);
//        $pfp->save(storage_path('app/profile_pictures/pfp.png'));
        return view('profile.index', [
            'title' => "$data->name's profile",
            'user' => $data,
            'pfp' => env('APP_URL').'/profile_pictures/pfp.png',
            'products' => $data->products,
        ]);
    }

    public function dashboard($id) {
        Gate::authorize('user-views', $id);
        $data = User::findOrFail($id);
        return view('profile.dashboard', [
            'title' => "$data->name's dashboard",
            'user' => $data,
        ]);
    }

    public function upload($id) {
        Gate::authorize('user-views', $id);
        return view('profile.upload',[
            'title' => "Upload product",
        ]);
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

    public function showByName(ShowByNameRequest $request){
        $data = $request->validated();
        $users = User::where('name', 'like', '%' . $data['name'] . '%')->get();
        $resources = [];
        foreach ($users as $user) {
            $resources[] = new UserResource($user);
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
    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        if(array_key_exists("profilePictureURI", $data) && $data["profilePictureURI"] != null){
            $data['profilePictureURI'] = $data['profilePictureURI']->store('profile_pictures');
        }
        if(array_key_exists("categories", $data)){
            $ids = [];
            foreach($user->categories as $category){
                $ids[] = $category->id;
            }
            $user->categories()->detach($ids);
            foreach ($request->categories as $category) {
                $user->categories()->attach($category);
            }
        }
        $user->update($data);
        return new UserResource($user);
    }

    public function passwordUpdate(PasswordUpdateRequest $request){
        $data = $request->validated();
        $user = auth()->user();
        $user->password = Hash::make($data['password']);
        $user->save();
    }

    public function updateAdmin(UpdateUserRequest $request, $id){
        $user = User::findOrFail($id);
        $data = $request->validated();
        $user->update($data);
        return new UserResource($user);
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
        $user->delete();
        return response()->json(['message' => 'success'], 200);
    }
}
