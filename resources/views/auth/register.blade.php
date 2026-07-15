@extends('layouts.auth')

@section('title', 'Register')

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

.register-page{
    min-height:100vh;
    background:url('{{ asset("images/bg.jpg") }}') center center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
}

.register-page::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.register-box{
    position:relative;
    width:450px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:20px;
    padding:40px;
    color:#fff;
}

.register-box h1{
    text-align:center;
    font-size:34px;
    margin-bottom:10px;
}

.register-box p{
    text-align:center;
    color:#ddd;
    margin-bottom:30px;
}

.form-group{
    margin-bottom:18px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-size:15px;
}

.form-group input{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    outline:none;
    font-size:15px;
}

.btn-register{
    width:100%;
    padding:15px;
    border:2px solid #fff;
    background:#fff;
    color:#000;
    border-radius:30px;
    cursor:pointer;
    font-size:16px;
    font-weight:600;
    transition:.3s;
}

.btn-register:hover{
    background:transparent;
    color:#fff;
}

.bottom-link{
    margin-top:25px;
    text-align:center;
    color:#ddd;
}

.bottom-link a{
    color:#fff;
    text-decoration:none;
    font-weight:600;
}

.bottom-link a:hover{
    text-decoration:underline;
}

.error{
    color:#ff7d7d;
    margin-top:5px;
    font-size:14px;
}

@media(max-width:500px){

.register-box{
    width:92%;
    padding:30px;
}

}
</style>

<div class="register-page">

    <div class="register-box">

        <h1>X-CarWash</h1>

        <p>Buat akun baru untuk melakukan booking layanan.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus>

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required>

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

            <div class="form-group">
                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    required>

                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-register">
                REGISTER
            </button>

        </form>

        <div class="bottom-link">

            Sudah punya akun?
            <a href="{{ route('login') }}">
                Login
            </a>

        </div>

    </div>

</div>

@endsection