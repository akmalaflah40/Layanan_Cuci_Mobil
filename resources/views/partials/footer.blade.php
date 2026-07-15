<style>
.footer{
    background:#111;
    color:#fff;
    padding:60px 100px 20px;
}

.footer-container{
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:40px;
}

.footer-box{
    flex:1;
    min-width:220px;
}

.footer-box h2,
.footer-box h3{
    margin-bottom:20px;
    font-weight:600;
    letter-spacing:1px;
}

.footer-box h2{
    text-transform:uppercase;
}

.footer-box p{
    color:#bbb;
    line-height:1.8;
    font-size:15px;
}

.footer-box ul{
    list-style:none;
}

.footer-box ul li{
    margin-bottom:12px;
}

.footer-box ul li a{
    color:#bbb;
    text-decoration:none;
    transition:.3s;
}

.footer-box ul li a:hover{
    color:#fff;
    padding-left:8px;
}

.footer-contact p{
    margin-bottom:12px;
}

.footer-contact i{
    width:25px;
}

.footer-social{
    margin-top:20px;
}

.footer-social a{
    display:inline-flex;
    width:40px;
    height:40px;
    justify-content:center;
    align-items:center;
    border:1px solid #555;
    border-radius:50%;
    color:#fff;
    margin-right:10px;
    text-decoration:none;
    transition:.3s;
}

.footer-social a:hover{
    background:#fff;
    color:#111;
}

.footer-bottom{
    margin-top:50px;
    border-top:1px solid #333;
    padding-top:20px;
    text-align:center;
    color:#999;
    font-size:14px;
}

@media(max-width:768px){

.footer{
    padding:50px 30px 20px;
}

.footer-container{
    flex-direction:column;
}

}
</style>

<footer class="footer">

    <div class="footer-container">

        <div class="footer-box">
            <h2>X-CarWash</h2>

            <p>
                Layanan cuci mobil profesional langsung ke lokasi Anda.
                Praktis, cepat, bersih, dan berkualitas.
            </p>

            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <div class="footer-box">
            <h3>Menu</h3>

            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('booking') }}">Booking</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>

        <div class="footer-box footer-contact">
            <h3>Contact</h3>

            <p><i class="fas fa-map-marker-alt"></i> Yogyakarta, Indonesia</p>
            <p><i class="fas fa-phone"></i> +62 812-3456-7890</p>
            <p><i class="fas fa-envelope"></i> info@xcarwash.com</p>
        </div>

        <div class="footer-box">
            <h3>Jam Operasional</h3>

            <p>Senin - Jumat</p>
            <p>08.00 - 20.00 WIB</p>

            <br>

            <p>Sabtu - Minggu</p>
            <p>09.00 - 18.00 WIB</p>
        </div>

    </div>

    <div class="footer-bottom">
        © {{ date('Y') }} X-CarWash. All Rights Reserved.
    </div>

</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">