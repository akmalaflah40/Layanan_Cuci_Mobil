@extends('layouts.app')

@section('title', 'Booking')

@section('content')

<style>
.booking-hero{
    height:50vh;
    background:url('{{ asset("images/booking-bg.png") }}') center center/cover no-repeat;
    position:relative;
    display:flex;
    justify-content:center;
    align-items:center;
}

.booking-hero::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.65);
}

.booking-hero h1{
    position:relative;
    color:#fff;
    font-size:50px;
    letter-spacing:2px;
    z-index:2;
}

.booking-section{
    max-width:900px;
    margin:80px auto;
    padding:0 25px;
}

.booking-form{
    background:#fff;
    padding:40px;
    box-shadow:0 5px 20px rgba(0,0,0,.1);
    border-radius:10px;
}

.booking-form h2{
    text-align:center;
    margin-bottom:30px;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
}

.form-group input,
.form-group select,
.form-group textarea{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:15px;
    font-family:Poppins,sans-serif;
}

.form-group textarea{
    resize:vertical;
}

.btn-submit{
    width:100%;
    padding:14px;
    background:#111;
    color:#fff;
    border:none;
    cursor:pointer;
    font-size:16px;
    font-weight:600;
    transition:.3s;
}

.btn-submit:hover{
    background:#333;
}

@media(max-width:768px){

.booking-hero h1{
    font-size:35px;
}

.booking-form{
    padding:25px;
}

}
/* Popup */

.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.6);
    z-index:9999;
    justify-content:center;
    align-items:center;
}

.modal-content{
    background:#fff;
    width:90%;
    max-width:420px;
    border-radius:10px;
    padding:30px;
    text-align:center;
}

.modal-content h2{
    margin-bottom:15px;
}

.modal-content button{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:none;
    cursor:pointer;
    border-radius:6px;
    font-weight:bold;
}

.btn-black{
    background:#111;
    color:#fff;
}

.btn-white{
    background:#fff;
    border:1px solid #111;
}

.btn-gray{
    background:#ddd;
}

.modal img{
    width:220px;
    margin:20px auto;
    display:block;
}
</style>

<!-- Hero -->
<section class="booking-hero">
    <h1>Booking Layanan</h1>
</section>

<!-- Form Booking -->
<section class="booking-section">

    <div class="booking-form">

        <h2>Form Pemesanan</h2>
@if(session('success'))

<div style="background:#d4edda;padding:15px;border-radius:8px;margin-bottom:20px;color:#155724;">

    {{ session('success') }}

</div>

@endif
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input
type="text"
name="nama_lengkap"
placeholder="Masukkan nama Anda"
required>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input
type="text"
name="no_hp"
placeholder="08xxxxxxxxxx"
required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea
name="alamat"
rows="3"
required></textarea>
            </div>
            <div class="form-group">
    <label>Kendaraan</label>
    <input
type="text"
name="kendaraan"
required>
</div>
            <div class="form-group">
                <label>Jenis Layanan</label>

                <select name="service_id" required>

    <option value="">Pilih Layanan</option>

    @foreach($services as $service)

        <option value="{{ $service->id }}">

            {{ $service->nama_layanan }}
            -
            Rp{{ number_format($service->harga,0,',','.') }}

        </option>

    @endforeach

</select>
            </div>

            <div class="form-group">
                <label>Tanggal Booking</label>
                <input
type="date"
name="tanggal_booking"
required>
            </div>

            <div class="form-group">
                <label>Jam Booking</label>
                <input
type="time"
name="jam_booking"
required>
            </div>

            <div class="form-group">
                <label>Catatan</label>
                <textarea
name="catatan"
rows="4"></textarea>
            </div>

            <button type="submit" class="btn-submit">
                Booking Sekarang
            </button>

        </form>

    </div>

</section>
@if(session('payment'))

<div id="paymentModal" class="modal" style="display:flex;">

    <div class="modal-content">

        <h2>Pembayaran</h2>

        <p>Booking berhasil dibuat.</p>

        <h3>
            Total :
            Rp{{ number_format(session('total'),0,',','.') }}
        </h3>

        <button class="btn-black" onclick="showTransfer()">
            Transfer Bank
        </button>

        <button class="btn-black" onclick="showQRIS()">
            QRIS
        </button>

        <button class="btn-gray" onclick="closePayment()">
            Bayar di Tempat
        </button>

    </div>

</div>

@endif
<div id="transferBox" class="modal">

    <div class="modal-content">

        <h2>Transfer Bank</h2>

        <p><b>Bank BCA</b></p>

        <p>1234567890</p>

        <p>a.n. X-CarWash</p>

        <button class="btn-black" onclick="closeTransfer()">
            Saya Sudah Transfer
        </button>

    </div>

</div>
<div id="qrisBox" class="modal">

    <div class="modal-content">

        <h2>QRIS</h2>

        <img src="{{ asset('images/qris.png') }}" alt="QRIS">

        <button class="btn-black" onclick="closeQRIS()">
            Saya Sudah Bayar
        </button>

    </div>

</div>
<script>

function showTransfer(){

    document.getElementById('paymentModal').style.display='none';
    document.getElementById('transferBox').style.display='flex';

}

function showQRIS(){

    document.getElementById('paymentModal').style.display='none';
    document.getElementById('qrisBox').style.display='flex';

}

function closeTransfer(){

    document.getElementById('transferBox').style.display='none';

}

function closeQRIS(){

    document.getElementById('qrisBox').style.display='none';

}

function closePayment(){

    document.getElementById('paymentModal').style.display='none';

}

</script>
@endsection