<!doctype html>
<html lang="hu">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>@yield('title')</title>
    @yield('header')
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">ArtShop</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success ms-auto" type="submit">Search</button>
            </form>
            <div class="d-flex">
            @auth
                <a class="btn btn-outline-success align-self-center" role="button" href="{{route('profile.upload', ['id' => \Illuminate\Support\Facades\Auth::user()->id])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                    </svg> Upload product
                </a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileOptions" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="navbar-text">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </span>
                    <img src=" {{ \Illuminate\Support\Facades\Auth::user()->getProfilePictureURI() }}" alt="" width="45px" height="45px" style="border-radius:50%; margin-left: 8px">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileOptions">
                        <li><a class="dropdown-item" href="{{ route('profile.index', ['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('messages') }}">Messages</a></li>
                        <li><a class="dropdown-item" href="#">Items</a></li>
                        <li><a class="dropdown-item" href="{{ route('settings.index') }}">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            @else
                <button class="btn btn-outline-success me-2" type="submit">Register</button>
                <button class="btn btn-outline-success" type="submit" onclick="openModal('loginModal')">Login</button>
            @endauth
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="modal" tabindex="-1" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{ Form::open(['route' => 'auth.login', 'id' => 'loginForm']) }}
                    
                    <div class="modal-body">
                        <div class="mb-3">
                            {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                            {{ Form::email('email', '', ['class' => 'form-control']) }}
                        </div>
                        <div class="mb-3">
                            {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" onclick="sendForm()">Login</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @yield('templates')

    <script>
        function openModal(id){
            var myModal = new bootstrap.Modal(document.getElementById(id));
            myModal.show();
        }

        function sendForm(){
            axios.defaults.withCredentials = true;
            form = document.getElementById('loginForm');
            axios.get('/sanctum/csrf-cookie').then(response => {
                form.submit();
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('script')
</body>
</html>
