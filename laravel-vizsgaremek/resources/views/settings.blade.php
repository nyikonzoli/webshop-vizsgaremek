@extends('layouts.main')

@section('title', 'Settings')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endsection

@section('content')
    <div class="wrapper col-lg-6 mx-auto">
        <div class="menu col-lg-4">
            <button class="menu-button" onclick="credentials();">Credentials</button>
            <button class="menu-button" onclick="profile();">Profile picture</button>
            <button class="menu-button" onclick="password();">Password</button>
            <button class="menu-button-warning">Delete account</button>
        </div>
        <div class="settings col-lg-8">
            <div id="profile-picture" class="setting-div">
                <h3 class="title">Change your profile picture</h3>
                <div>
                    <div class="image">
                        <img src="{{ $user->getProfilePictureURI() }}" alt="" whidth="200px" height="200px" id="profile-img">
                        <button class="delete-image" onclick="deleteProfilePicture();">Delete</button>
                    </div>
                    <div id="form-wrapper">
                        <div class="form">
                            <div id="input-wrapper">
                                {{ Form::file('image', ['id' => 'image-upload']) }}
                                <p>Drag your new profile picture here or click in this area.</p>
                            </div>
                            <button class="submit-button" id="submit-button" onclick="uploadProfilePicture();">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="password" class="setting-div">
                <h3>Change you password</h3>
                <div class="mb-3">
                    <div style="width: 250px" class="mx-auto">
                        <label for="password" class="col-form-label">New password</label>
                        <input type="password" id="password1" class="form-control" style="width: 250px"> 
                    </div>      
                </div>
                <div class="mb-3">
                    <div style="width: 250px" class="mx-auto">
                        <label for="password_confirmation" class="col-form-label">Confirm password</label>
                        <input type="password" id="password_confirmation" class="form-control" >
                    </div>
                </div> 
                <div style="width: 250px" class="mx-auto">
                    <button class="submit-button" onclick="changePassword();">Change password</button>
                </div>
            </div>
            <div id="credentials" class="setting-div">
                <h3>Change you credentials</h3>
                <div class="mb-3">
                    <div style="width: 400px" class="mx-auto">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" id="name" class="form-control" style="width: 400px"> 
                    </div>      
                </div>
                <div class="mb-3">
                    <div style="width: 400px" class="mx-auto">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" rows="4"></textarea>
                    </div>
                </div> 
                <div class="mb-3">
                    <div style="width: 400px" class="mx-auto">
                        <label for="address" class="col-form-label">Address</label>
                        <input type="text" id="address" class="form-control" style="width: 400px"> 
                    </div>      
                </div>
                @foreach($categories as $category)
                    <div class="mb-3">
                        <div style="width: 400px" class="mx-auto">
                            {{ Form::label('categories[]', $category->name, ['class' => 'form-label']) }}
                            {{ Form::checkbox('categories[]', $category->id) }}
                        </div>
                    </div>   
                @endforeach
                <div style="width: 400px" class="mx-auto">
                    <button class="submit-button" onclick="updateCredentials();">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function updateCredentials(){
            data = getUserData();
            data["name"] = document.getElementById("name").value;
            data["description"] = document.getElementById("description").value;
            data["address"] = document.getElementById("address").value;
            checkboxes = document.getElementsByName("categories[]");
            values = [];
            checkboxes.forEach(box => {
                if(box.checked){
                    values.push(box.value);
                }
            });
            data["categories"] = values;
            console.log(data);
            axios.put('{{ route("user.update") }}', data).then(function(response){
                console.log(response)
            });
        }

        function changePassword(){
            data = {
                password: document.getElementById("password1").value,
                password_confirmation: document.getElementById("password_confirmation").value,
            };
            axios.post("{{ route('user.password.update') }}", data).then(function(response){
                document.getElementById("password").value = "";
                document.getElementById("password_confirmation").value = "";
            });
        }

        function uploadProfilePicture(){
            data = getUserData();
            var fd = new FormData();
            fd.append('profilePictureURI', document.getElementById("image-upload").files[0]);
            fd.append('name', data["name"]);
            fd.append('email', data["email"]);
            fd.append('birthdate', data["birthdate"]);
            fd.append('address', data["address"]);
            fd.append('description', data["description"]);
            for(var pair of fd.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
            }
            data["profilePictureURI"] = document.getElementById("image-upload").files[0];
            console.log(data);
            axios.put("{{ route('user.update') }}", fd, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function (response){
                console.log(response);
                document.getElementById('profile-img').src = response["data"]["data"]["profilePictureURI"];
                document.getElementById('nav-profile').src = response["data"]["data"]["profilePictureURI"];
            }).catch(err=>console.log(err.response.data));
        }

        function deleteProfilePicture(){
            data = getUserData();
            data["profilePictureURI"] = null;
            axios.put("{{ route('user.update') }}", data).then(function (response){
                document.getElementById('profile-img').src = response["data"]["data"]["profilePictureURI"];
                document.getElementById('nav-profile').src = response["data"]["data"]["profilePictureURI"];
            });
        }

        function getUserData(){
            return {
                name: "{{ $user->name }}",
                email: "{{ $user->email }}",
                birthdate: "{{ $user->birthdate }}",
                address: "{{ $user->address }}",
                description: "{{ $user->description }}",
            }
        }

        function profile(){
            document.getElementById('profile-picture').style.display = "block";
            document.getElementById('password').style.display = "none";
            document.getElementById('credentials').style.display = "none";
        }

        function password(){
            document.getElementById('profile-picture').style.display = "none";
            document.getElementById('password').style.display = "block";
            document.getElementById('credentials').style.display = "none";
        }

        function credentials(){
            document.getElementById('profile-picture').style.display = "none";
            document.getElementById('password').style.display = "none";
            document.getElementById('credentials').style.display = "block";
        }

        window.onload = function() {
            profile();
            document.getElementById("name").value = "{{ $user->name }}";
            document.getElementById("description").value = "{{ $user->description }}";
            document.getElementById("address").value = "{{ $user->address }}";

        }
    </script>
@endsection