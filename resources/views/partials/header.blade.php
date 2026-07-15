<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body
{
    background: #000;
    min-height: 200vh;
}
header
{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.6s;
    padding: 40px 100px;
    z-index: 100000;
}
header .logo
{
    position: relative;
    font-weight: 700;
    color: #fff;
    text-decoration: none;
    font-size: 2em;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: 0.6s;
}
header ul
{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
header ul li
{
    position: relative;
    list-style: none;
}
header ul li .nav
{
    position: relative;
    margin: 0 15px;
    padding: 8px 0;
    text-decoration: none;
    color: #fff;
    letter-spacing: 2px;
    font-weight: 500;
    transition: all .4s ease;
}

header ul li .nav::after
{
    content: "";
    position: absolute;
    left: 50%;
    bottom: 0;
    width: 0;
    height: 2px;
    background: #fff;
    transition: .4s ease;
    transform: translateX(-50%);
}

header ul li .nav:hover
{
    color: #fff;
    transform: translateY(-3px);
}

header ul li .nav:hover::after
{
    width: 100%;
}

header.sticky ul li .nav
{
    color: #000;
}

header.sticky ul li .nav::after
{
    background: #000;
}

header.sticky ul li .nav:hover
{
    color: #000;
    transform: translateY(-3px);
}

header.sticky
{
    padding: 5px 100px;
    background: #fff;
}
header.sticky .logo,
header.sticky ul li a
{
    color: #000;
}

.login-btn,
.logout-btn{
    display: inline-block;
    padding: 10px 25px;
    background: #fff;
    color: #000;
    border: 2px solid #fff;
    border-radius: 30px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    transition: 0.4s;
    margin-left: 15px;
}

.login-btn:hover,
.logout-btn:hover{
    background: transparent;
    color: #fff;
}

.logout-btn{
    font-family: 'Poppins', sans-serif;
}

header.sticky .login-btn,
header.sticky .logout-btn{
    background: #000;
    color: #fff;
    border-color: #000;
}

header.sticky .login-btn:hover,
header.sticky .logout-btn:hover{
    background: transparent;
    color: #000;
}
header ul li .nav.active
{
    color: #fff;
}

header ul li .nav.active::after
{
    width: 100%;
    background: #fff;
}

header.sticky ul li .nav.active
{
    color: #000;
}

header.sticky ul li .nav.active::after
{
    background: #000;
}
.profile-menu{
    position: relative;
    margin-left:20px;
}

.profile-btn{
    width:45px;
    height:45px;
    border-radius:50%;
    overflow:hidden;
    cursor:pointer;
    border:2px solid #fff;
    transition:.3s;
}

.profile-btn img{
    width:100%;
    height:100%;
    object-fit:cover;
}

header.sticky .profile-btn{
    border-color:#000;
}

.dropdown{
    position:absolute;
    top:60px;
    right:0;
    background:#fff;
    width:180px;
    border-radius:10px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
    overflow:hidden;
    display:none;
}

.dropdown a,
.dropdown button{
    width:100%;
    display:block;
    padding:12px 18px;
    color:#000;
    text-decoration:none;
    border:none;
    background:none;
    text-align:left;
    cursor:pointer;
    font-size:14px;
    transition:.3s;
}

.dropdown a:hover,
.dropdown button:hover{
    background:#f5f5f5;
}

.profile-menu.active .dropdown{
    display:block;
}
</style>
<header>
    <a href="#" class="logo">X-CarWash</a>
    <ul>
        <li><a href="{{ route('home') }}"
            class="nav {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('about') }}"
            class="nav {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('services') }}"
            class="nav {{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
        <li><a href="{{ route('contact') }}"
            class="nav {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
    @guest
        <li>
            <a href="{{ route('login') }}" class="login-btn">
                Login
            </a>
        </li>
    @endguest
    @auth
        <li>
        <a href="{{ route('booking') }}"
            class="nav {{ request()->routeIs('booking') ? 'active' : '' }}">Booking</a>
    </li>
    
<li class="profile-menu">

    <div class="profile-btn" id="profileButton">

        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
             alt="Profile">

    </div>

    <div class="dropdown" id="dropdownMenu">

        @if(Auth::user()->role == 'admin')

            <a href="{{ route('admin.dashboard') }}">
                Dashboard Admin
            </a>

        @else

            <a href="{{ route('user.dashboard') }}">
                Dashboard Saya
            </a>

        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                Logout
            </button>
        </form>

    </div>

</li>
    @endauth
    </ul>
</header>
<section class="banner"></section>
<script type="text/javascript">
    window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0)
    });
</script>

<script>
    const profileBtn = document.getElementById("profileButton");
    const profileMenu = document.querySelector(".profile-menu");

    if (profileBtn && profileMenu) {

        profileBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            profileMenu.classList.toggle("active");
        });

        document.addEventListener("click", function () {
            profileMenu.classList.remove("active");
        });

    }
</script>