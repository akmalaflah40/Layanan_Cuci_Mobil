@extends('layouts.app')

@section('title', 'About')

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

.about-hero{
    min-height:60vh;
    background:url('{{ asset("images/about-bg.png") }}') center center/cover no-repeat;
    position:relative;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    padding:100px 20px;
}

.about-hero::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.about-hero h1{
    position:relative;
    z-index:2;
    color:#fff;
    font-size:52px;
    font-weight:700;
    letter-spacing:2px;
}

/* ================= ABOUT ================= */

.about-section{
    max-width:1200px;
    margin:auto;
    padding:80px 100px;
}

.about-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:60px;
    align-items:center;
}

.about-grid img{
    width:100%;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.35s;
}

.about-grid img:hover{
    transform:scale(1.03);
}

.about-text h2{
    font-size:38px;
    font-weight:700;
    color:#111;
    margin-bottom:20px;
    position:relative;
}

.about-text h2::after{
    content:'';
    display:block;
    width:70px;
    height:3px;
    background:#111;
    margin-top:12px;
    border-radius:10px;
}

.about-text p{
    color:#555;
    line-height:2;
    text-align:justify;
    font-size:16px;
    margin-bottom:18px;
}

/* ================= VISI MISI ================= */

.vm-section{
    margin-top:80px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:30px;
}

.vm-card{
    background:#fff;
    border-radius:20px;
    padding:35px;
    text-align:center;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.35s;
    border-top:4px solid #111;
}

.vm-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.vm-card i{
    font-size:48px;
    color:#111;
    margin-bottom:20px;
}

.vm-card h3{
    color:#111;
    font-size:24px;
    margin-bottom:15px;
}

.vm-card p{
    color:#666;
    line-height:1.8;
}

/* ================= RESPONSIVE ================= */

@media(max-width:992px){

.about-section{
    padding:70px 50px;
}

}

@media(max-width:768px){

.about-hero{
    min-height:45vh;
}

.about-hero h1{
    font-size:36px;
}

.about-section{
    padding:60px 25px;
}

.about-grid{
    grid-template-columns:1fr;
    gap:40px;
}

.about-text h2{
    font-size:30px;
}

}
</style>

<!-- Hero -->
<section class="about-hero">
    <h1>Tentang Kami</h1>
</section>

<!-- Profil -->
<section class="about-section">

    <div class="about-grid">

        <div>
            <img src="{{ asset('images/about.png') }}" alt="Tentang Kami">
        </div>

        <div class="about-text">

            <h2>X-CarWash</h2>

            <p>
                X-CarWash adalah penyedia layanan cuci dan salon mobil panggilan
                yang siap melayani pelanggan langsung di rumah, kantor,
                maupun lokasi pilihan Anda. Dengan tenaga profesional dan
                peralatan modern, kami memberikan hasil terbaik tanpa Anda
                harus keluar rumah.
            </p>

            <br>

            <p>
                Kepuasan pelanggan merupakan prioritas utama kami. Kami
                berkomitmen memberikan pelayanan yang cepat, berkualitas,
                dan terpercaya dengan harga yang terjangkau.
            </p>

        </div>

    </div>

    <!-- Visi Misi -->
    <div class="vm-section">

        <div class="vm-card">
            <i class="fas fa-eye"></i>

            <h3>Visi</h3>

            <p>
                Menjadi layanan cuci mobil panggilan terbaik dan terpercaya
                di Indonesia.
            </p>

        </div>

        <div class="vm-card">
            <i class="fas fa-bullseye"></i>

            <h3>Misi</h3>

            <p>
                Memberikan pelayanan berkualitas, cepat, profesional,
                dan selalu mengutamakan kepuasan pelanggan.
            </p>

        </div>

        <div class="vm-card">
            <i class="fas fa-handshake"></i>

            <h3>Komitmen</h3>

            <p>
                Menggunakan produk berkualitas serta tenaga kerja yang
                berpengalaman agar kendaraan pelanggan selalu bersih
                dan terawat.
            </p>

        </div>

    </div>

</section>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

@endsection