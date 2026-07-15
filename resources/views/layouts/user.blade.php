<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','User Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins',sans-serif;
    }

    body{
        background:#f5f5f5;
    }

    .sidebar{
        width:260px;
        height:100vh;
        background:#000;
        position:fixed;
        left:0;
        top:0;
        color:#fff;
    }

    .sidebar h2{
        padding:30px;
        font-size:28px;
        font-weight:700;
        letter-spacing:2px;
    }

    .sidebar ul{
        list-style:none;
    }

    .sidebar ul li a{
        display:flex;
        align-items:center;
        gap:15px;
        color:white;
        padding:16px 30px;
        text-decoration:none;
        transition:.3s;
    }

    .sidebar ul li a:hover{
        background:white;
        color:black;
        padding-left:38px;
    }

    .sidebar ul li a.active{
        background:white;
        color:black;
    }

    .content{
        margin-left:260px;
        min-height:100vh;
    }

    .topbar{
        background:white;
        height:80px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:0 40px;
        box-shadow:0 2px 15px rgba(0,0,0,.08);
    }

    .profile{
        display:flex;
        align-items:center;
        gap:15px;
    }

    .profile img{
        width:45px;
        height:45px;
        border-radius:50%;
    }

    .main{
        padding:40px;
    }

    .card{
        background:white;
        border-radius:12px;
        padding:25px;
        box-shadow:0 5px 15px rgba(0,0,0,.08);
        transition:.3s;
    }

    .card:hover{
        transform:translateY(-5px);
    }

    </style>

</head>

<body>

<div class="sidebar">

    <h2>X-CarWash</h2>

    <ul>
<li>
    <a href="{{ route('home') }}">

        <span class="material-symbols-outlined">
            home
        </span>

        Home

    </a>
</li>
        <li>
            <a href="{{ route('user.dashboard') }}"
               class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">

                <span class="material-symbols-outlined">dashboard</span>

                Dashboard

            </a>
        </li>

        <li>

            <a href="{{ route('user.profile') }}"
               class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">

                <span class="material-symbols-outlined">person</span>

                Profil Saya

            </a>

        </li>

        <li>

            <a href="{{ route('user.bookings') }}"
               class="{{ request()->routeIs('user.bookings') ? 'active' : '' }}">

                <span class="material-symbols-outlined">event_note</span>

                Booking Saya

            </a>

        </li>

        <li>

            <a href="{{ route('user.history') }}"
               class="{{ request()->routeIs('user.history') ? 'active' : '' }}">

                <span class="material-symbols-outlined">receipt_long</span>

                Riwayat Transaksi

            </a>

        </li>

        <li>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    style="width:100%;border:none;background:none;color:white;padding:16px 30px;text-align:left;cursor:pointer;font-size:15px;display:flex;align-items:center;gap:15px;">

                    <span class="material-symbols-outlined">logout</span>

                    Logout

                </button>

            </form>

        </li>

    </ul>

</div>

<div class="content">

    <div class="topbar">

        <div>

            <h2>@yield('page-title')</h2>

            <small>Selamat datang di Dashboard User</small>

        </div>

        <div class="profile">

            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="">

            <div>

                <strong>{{ Auth::user()->name }}</strong><br>

                <small>User</small>

            </div>

        </div>

    </div>

    <div class="main">

        @yield('content')

    </div>

</div>

</body>
</html>