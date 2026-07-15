@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f5f5f5;
    color:#111;
    font-family:Arial, Helvetica, sans-serif;
}

/* ================= HERO ================= */

.contact-hero{
    min-height:50vh;
    background:url('{{ asset("images/contact-bg.png") }}') center center/cover no-repeat;
    position:relative;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    padding:100px 20px;
}

.contact-hero::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.contact-hero h1{
    position:relative;
    z-index:2;
    color:#fff;
    font-size:52px;
    font-weight:700;
    letter-spacing:2px;
}

/* ================= SECTION ================= */

.contact-section{
    max-width:1200px;
    margin:auto;
    padding:80px 100px;
}

.contact-container{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:35px;
}

/* ================= INFO CARD ================= */

.contact-info{
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.contact-info:hover{
    transform:translateY(-5px);
}

.contact-info h2{
    margin-bottom:20px;
    font-size:28px;
    color:#111;
}

.contact-info p{
    color:#555;
    line-height:1.8;
    margin-bottom:15px;
}

.contact-info i{
    width:30px;
    color:#111;
}

/* ================= FORM ================= */

.contact-form{
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.contact-form h2{
    margin-bottom:25px;
    font-size:28px;
    color:#111;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#111;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:12px;
    font-size:15px;
    background:#fff;
    outline:none;
    transition:.3s;
}

.form-group input:focus,
.form-group textarea:focus{
    border-color:#111;
}

/* ================= BUTTON ================= */

.btn-send{
    width:100%;
    padding:14px;
    background:#111;
    color:#fff;
    border:none;
    cursor:pointer;
    font-size:16px;
    font-weight:600;
    border-radius:50px;
    transition:.3s;
    border:2px solid #111;
}

.btn-send:hover{
    background:#fff;
    color:#111;
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

.contact-hero h1{
    font-size:36px;
}

.contact-section{
    padding:60px 25px;
}

.contact-container{
    grid-template-columns:1fr;
}

.contact-info,
.contact-form{
    padding:25px;
}

}

</style>

<!-- Hero -->
<section class="contact-hero">
    <h1>Hubungi Kami</h1>
</section>

<!-- Contact -->
<section class="contact-section">

    <div class="contact-container">

        <!-- Informasi -->
        <div class="contact-info">

            <h2>Informasi Kontak</h2>

            <p>
                Kami siap melayani kebutuhan cuci dan salon mobil Anda.
                Hubungi kami melalui informasi di bawah ini.
            </p>

            <p>
                <i class="fas fa-map-marker-alt"></i>
                Yogyakarta, Indonesia
            </p>

            <p>
                <i class="fas fa-phone"></i>
                +62 812-3456-7890
            </p>

            <p>
                <i class="fas fa-envelope"></i>
                info@xcarwash.com
            </p>

            <p>
                <i class="fas fa-clock"></i>
                Senin - Minggu (08.00 - 20.00 WIB)
            </p>

        </div>

        <!-- Form -->
        <div class="contact-form">

            <h2>Kirim Pesan</h2>

            <form action="#" method="POST">

                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan nama Anda">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email Anda">
                </div>

                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" name="subjek" placeholder="Masukkan subjek">
                </div>

                <div class="form-group">
                    <label>Pesan</label>
                    <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda"></textarea>
                </div>

                <button type="submit" class="btn-send">
                    Kirim Pesan
                </button>

            </form>

        </div>

    </div>

</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

@endsection