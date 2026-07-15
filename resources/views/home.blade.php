@extends('layouts.app')

@section('title', 'Home')

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

.hero{
    min-height:85vh;
    background:url('{{ asset("images/bg.png") }}') center center/cover no-repeat;
    position:relative;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    padding:100px 20px;
}

.hero::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.hero-content{
    position:relative;
    z-index:2;
    max-width:800px;
    color:#fff;
}

.hero-content h1{
    font-size:56px;
    font-weight:700;
    margin-bottom:20px;
    line-height:1.2;
}

.hero-content p{
    font-size:20px;
    color:#e5e5e5;
    line-height:1.7;
    margin-bottom:35px;
}

.btn-book{
    display:inline-block;
    padding:15px 40px;
    background:#111;
    color:#fff;
    text-decoration:none;
    border-radius:50px;
    font-weight:600;
    transition:.3s;
    border:2px solid #111;
}

.btn-book:hover{
    background:#fff;
    color:#111;
    transform:translateY(-4px);
}

/* ================= SECTION ================= */

.section{
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
    border-radius:10px;
}

/* ================= FEATURES ================= */

.features{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:30px;
}

.card{
    background:#fff;
    border-radius:20px;
    padding:35px;
    text-align:center;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.35s;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.card i{
    font-size:48px;
    color:#111;
    margin-bottom:20px;
}

.card h3{
    margin-bottom:15px;
    font-size:24px;
    color:#111;
}

.card p{
    color:#666;
    line-height:1.8;
}

/* ================= SERVICES ================= */

.services{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:35px;
}

.service-box{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.35s;
}

.service-box:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.service-box img{
    width:100%;
    height:230px;
    object-fit:cover;
    transition:.4s;
}

.service-box:hover img{
    transform:scale(1.05);
}

.service-content{
    padding:25px;
    border-top:1px solid #eee;
}

.service-content h3{
    font-size:24px;
    margin-bottom:15px;
    color:#111;
}

.service-content p{
    color:#666;
    line-height:1.8;
}

/* ================= RESPONSIVE ================= */

@media(max-width:992px){

.section{
    padding:70px 50px;
}

.hero-content h1{
    font-size:46px;
}

}

@media(max-width:768px){

.hero{
    min-height:75vh;
}

.hero-content h1{
    font-size:34px;
}

.hero-content p{
    font-size:17px;
}

.section{
    padding:60px 25px;
}

.section-title{
    font-size:30px;
}

.services,
.features{
    grid-template-columns:1fr;
}

}

</style>

<!-- HERO -->

<section class="hero">

    <div class="hero-content">

        <h1>
            Layanan Cuci & Salon Mobil Panggilan
        </h1>

        <p>
            Kami hadir langsung ke lokasi Anda dengan pelayanan profesional,
            cepat, bersih, dan terpercaya sehingga kendaraan Anda selalu
            tampil bersih dan mengkilap.
        </p>

        <a href="{{ route('booking') }}" class="btn-book">
            Booking Sekarang
        </a>

    </div>

</section>

<!-- KEUNGGULAN -->

<section class="section">

    <h2 class="section-title">
        Kenapa Memilih Kami?
    </h2>

    <div class="features">

        <div class="card">

            <i class="fas fa-car-side"></i>

            <h3>Profesional</h3>

            <p>
                Tim berpengalaman menggunakan peralatan modern
                untuk menghasilkan cucian yang maksimal.
            </p>

        </div>

        <div class="card">

            <i class="fas fa-location-dot"></i>

            <h3>Datang ke Lokasi</h3>

            <p>
                Tidak perlu keluar rumah.
                Kami siap melayani langsung di lokasi Anda.
            </p>

        </div>

        <div class="card">

            <i class="fas fa-stopwatch"></i>

            <h3>Cepat & Tepat Waktu</h3>

            <p>
                Proses cepat dengan hasil maksimal
                tanpa mengurangi kualitas pelayanan.
            </p>

        </div>

    </div>

</section>

<!-- LAYANAN -->

<section class="section">

    <h2 class="section-title">
        Layanan Kami
    </h2>

    <div class="services">

        <div class="service-box">

            <img src="{{ asset('images/cuci.png') }}" alt="Cuci Mobil">

            <div class="service-content">

                <h3>Cuci Mobil</h3>

                <p>
                    Layanan pencucian mobil secara menyeluruh mulai dari body,
                    kaca, velg, ban hingga pengeringan agar kendaraan kembali
                    bersih dan mengkilap.
                </p>

            </div>

        </div>

        <div class="service-box">

            <img src="{{ asset('images/salon.png') }}" alt="Salon Mobil">

            <div class="service-content">

                <h3>Salon Mobil</h3>

                <p>
                    Perawatan kendaraan seperti waxing, polishing, coating,
                    hingga detailing untuk menjaga cat mobil tetap mengkilap
                    dan terlindungi.
                </p>

            </div>

        </div>

        <div class="service-box">

            <img src="{{ asset('images/interior.png') }}" alt="Interior Cleaning">

            <div class="service-content">

                <h3>Interior Cleaning</h3>

                <p>
                    Membersihkan jok, dashboard, plafon, karpet, dan seluruh
                    bagian interior sehingga kabin menjadi bersih, segar,
                    dan nyaman digunakan.
                </p>

            </div>

        </div>

    </div>

</section>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

@endsection