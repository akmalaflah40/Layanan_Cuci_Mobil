@extends('layouts.app')

@section('title', 'Services')

@section('content')

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, Helvetica, sans-serif;
    background:#f5f5f5;
    color:#111;
}

/* ================= HERO ================= */

.services-hero{
    min-height:55vh;
    background:url('{{ asset("images/services-bg.png") }}') center center/cover no-repeat;
    position:relative;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    padding:100px 20px;
}

.services-hero::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.services-hero h1{
    position:relative;
    z-index:2;
    color:#fff;
    font-size:52px;
    font-weight:700;
    letter-spacing:2px;
}

/* ================= SECTION ================= */

.services-section{
    max-width:1200px;
    margin:auto;
    padding:80px 100px;
}

.section-title{
    text-align:center;
    font-size:38px;
    font-weight:700;
    color:#111;
    margin-bottom:60px;
    position:relative;
}

.section-title::after{
    content:'';
    width:70px;
    height:3px;
    background:#111;
    display:block;
    margin:15px auto 0;
    border-radius:20px;
}

/* ================= SERVICES ================= */

.services-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:25px;
}

.service-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.35s;
}

.service-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.service-card img{
    width:100%;
    height:230px;
    object-fit:cover;
    transition:.4s;
}

.service-card:hover img{
    transform:scale(1.05);
}

.service-content{
    padding:28px;
}

.service-content h3{
    font-size:24px;
    color:#111;
    margin-bottom:15px;
}

.service-content p{
    color:#555;
    line-height:1.8;
    margin-bottom:25px;
    min-height:80px;
}

.price{
    font-size:26px;
    font-weight:700;
    color:#111;
    margin-bottom:25px;
}

.btn-book{
    display:inline-block;
    width:100%;
    text-align:center;
    padding:14px;
    background:#111;
    color:#fff;
    text-decoration:none;
    border-radius:50px;
    border:2px solid #111;
    font-weight:600;
    transition:.3s;
}

.btn-book:hover{
    background:#fff;
    color:#111;
}

/* ================= RESPONSIVE ================= */

@media(max-width:992px){

.services-section{
    padding:70px 50px;
}

}

@media(max-width:768px){

.services-hero{
    min-height:45vh;
}

.services-hero h1{
    font-size:36px;
}

.services-section{
    padding:60px 25px;
}

.services-grid{
    grid-template-columns:1fr;
}

}
</style>
<!-- Hero -->
<section class="services-hero">
    <h1>Layanan Kami</h1>
</section>

<!-- Services -->
<section class="services-section">

    <div class="services-grid">

@foreach($services as $service)

<div class="service-card">

    <img src="{{ asset('storage/'.$service->gambar) }}"
         alt="{{ $service->nama_layanan }}">

    <div class="service-content">

        <h3>{{ $service->nama_layanan }}</h3>

        <p>{{ $service->deskripsi }}</p>

        <div class="price">
            Rp{{ number_format($service->harga,0,',','.') }}
        </div>

        <a href="{{ route('booking') }}" class="btn-book">
            Booking
        </a>

    </div>

</div>

@endforeach

</div>

</section>

@endsection