@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#000;
}

.login-page{
    min-height:100vh;
    background:url('{{ asset("images/bg.jpg") }}') center center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
}

.login-page::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.login-box{
    position:relative;
    width:420px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:20px;
    padding:40px;
    color:#fff;
}

.login-box h1{
    text-align:center;
    margin-bottom:10px;
    font-size:35px;
}

.login-box p{
    text-align:center;
    color:#ddd;
    margin-bottom:30px;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
}

.form-group input{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    outline:none;
    font-size:15px;
}

.btn-login{
    width:100%;
    padding:15px;
    border:2px solid #fff;
    background:#fff;
    color:#000;
    font-size:16px;
    font-weight:600;
    border-radius:30px;
    cursor:pointer;
    transition:.3s;
}

.btn-login:hover{
    background:transparent;
    color:#fff;
}

.links{
    margin-top:25px;
    text-align:center;
}

.links a{
    color:#fff;
    text-decoration:none;
}

.links a:hover{
    text-decoration:underline;
}

.error{
    color:#ff8080;
    margin-top:5px;
    font-size:14px;
}
</style>

<div class="login-page">

    <div class="login-box">

        <h1>X-CarWash</h1>

        <p>Silakan login untuk melanjutkan.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus>

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom:20px;">
                <label>
                    <input type="checkbox" name="remember">
                    Remember Me
                </label>
            </div>

            <button class="btn-login">
                LOGIN
            </button>

        </form>

        <div class="links">

            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
                <br><br>
            @endif

            @if(Route::has('register'))
                Belum punya akun?
                <a href="{{ route('register') }}">
                    Register
                </a>
            @endif

        </div>

    </div>

</div>

@endsection