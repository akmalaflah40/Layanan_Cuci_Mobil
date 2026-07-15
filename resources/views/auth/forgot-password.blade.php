@extends('layouts.auth')

@section('title', 'Forgot Password')

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

.forgot-page{
    min-height:100vh;
    background:url('{{ asset("images/bg.jpg") }}') center center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
}

.forgot-page::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.forgot-box{
    position:relative;
    width:450px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:20px;
    padding:40px;
    color:#fff;
}

.forgot-box h1{
    text-align:center;
    font-size:34px;
    margin-bottom:10px;
}

.forgot-box p{
    color:#ddd;
    text-align:center;
    margin-bottom:30px;
    line-height:1.7;
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

.btn-reset{
    width:100%;
    padding:15px;
    background:#fff;
    color:#000;
    border:2px solid #fff;
    border-radius:30px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-reset:hover{
    background:transparent;
    color:#fff;
}

.bottom-link{
    text-align:center;
    margin-top:25px;
}

.bottom-link a{
    color:#fff;
    text-decoration:none;
    font-weight:600;
}

.bottom-link a:hover{
    text-decoration:underline;
}

.success{
    background:rgba(0,255,0,.15);
    color:#8fff8f;
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;
    text-align:center;
}

.error{
    color:#ff8080;
    margin-top:6px;
    font-size:14px;
}

@media(max-width:500px){
    .forgot-box{
        width:92%;
        padding:30px;
    }
}
</style>

<div class="forgot-page">

    <div class="forgot-box">

        <h1>X-CarWash</h1>

        <p>
            Lupa password? Masukkan alamat email Anda.
            Kami akan mengirimkan link untuk membuat password baru.
        </p>

        @if(session('status'))
            <div class="success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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

            <button type="submit" class="btn-reset">
                Kirim Link Reset Password
            </button>

        </form>

        <div class="bottom-link">
            <a href="{{ route('login') }}">
                ← Kembali ke Login
            </a>
        </div>

    </div>

</div>

@endsection