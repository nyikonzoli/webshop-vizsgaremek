<!doctype html>
<html lang="hu">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>
        function f(){
            fetch('http://localhost:8881/api/name', {method: 'get'}).then(data => data.json()).then(data => p(data));
        }

        function p (data){
            document.getElementById('asd').innerHTML = data;
        }
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">ArtShop</a>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="d-flex">
            @auth
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileOptions" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="navbar-text">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </span>
                    <img src=" {{ \Illuminate\Support\Facades\Auth::user()->getProfilePictureURI() }}" alt="" width="45px" height="45px">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileOptions">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Messages</a></li>
                        <li><a class="dropdown-item" href="#">Items</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>

            @else
                <button class="btn btn-outline-primary" type="submit">Register</button>
                <button class="btn btn-outline-primary" type="submit" onclick="openModal()">Login</button>
            @endauth
        </div>
    </div>
    </nav>
    @yield('content')
    <p id="asd"></p>
    <button onclick="f()">a</button>
    

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
                        <button class="btn btn-primary">Login</button>
                        {{-- Form::submit('Login', ['class' => 'btn btn-primary']) --}}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script>
        function openModal(){
            var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
            myModal.show();
        }

        function sendForm(){
            form = document.getElementById('loginForm');
            axios.get('/sanctum/csrf-cookie').then(response => {
                form.submit();
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
