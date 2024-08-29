<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku || @yield('title')</title>
    {{-- link css boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
        }
        .sidebar ul li {
            padding: 10px 15px;
        }
        .sidebar li a {
            color: white;
            text-decoration: none;
        }
        .sidebar ul li:hover {
            background-color: rgb(8, 8, 8);
        }
    </style>
</head>
<body>

    <div class="main d-flex flex-column justify-content-between">
        {{-- Navbar start --}}
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Rental Buku</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-menu" aria-controls="toggle-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
        {{-- Navbar end --}}

        {{-- body-content star --}}
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                {{-- sidebar start --}}
                <div id="toggle-menu" class="sidebar col-lg-2 collapse d-lg-block bg-secondary text-white">
                    <ul class="list-unstyled">
                        @if (Auth::User()->role_id ==1)
                            <li>
                                <a href="dashboard">Dashboard</a>
                            </li>
                            <li>
                                <a href="books">Books</a>
                            </li>
                            <li>Categories</li>
                            <li>Users</li>
                            <li>Rent Log</li>
                            <li>
                                <a href="logout">Logout</a>
                            </li>
                        @else
                            <li>
                                <a href="profile">Profile</a>
                            </li>
                            <li>
                                <a href="logout">Logout</a>
                            </li>
                        @endif

                    </ul>
                </div>
                {{-- sidebar end --}}

                {{-- content start --}}
                <div class="content col-lg-10 p-5">
                    @yield('content')
                </div>
                {{-- content end --}}
            </div>
        </div>
        {{-- body-content end --}}
    </div>

    {{-- link javascript boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
