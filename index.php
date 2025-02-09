<?php
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Desa Kalegen</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>BumdesKalegen</a></div>
            <div class="menu">
                <ul>
                    <li><a href="#Beranda">Beranda</a></li>
                    <li><a href="#Tentang">Tentang</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <li><a href="login.php" class="tbl-biru">Sign in</a></li>
                    <li><a href="Admin/login.php" class="tbl-biru">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <!-- untuk Beranda -->
        <section id="Beranda">
            <img src="<?php echo ambil_gambar('1')?>"/>
            <div class="kolom">
                <p class="deskripsi"><?php echo ambil_kalimat('1')?></p>
                <h2><?php echo ambil_isi('1')?></h2>
                <p><a href="<?php echo buat_link_halaman('1')?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
            </div>
        </section>

        <!-- untuk Tentang -->
        <section id="Tentang">
            <div class="kolom">
                <p class="deskripsi">Tentang</p>
                <h2><?php echo ambil_kalimat('3')?></h2>
                <p><?php echo ambil_isi('3')?></p>
            </div>
        </section>

    <div id="Contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>Alamat</h3>
                    <p>Jl. Raya Kalegen, Wonosobo, Kalegen, Kec. Bandongan, Kabupaten Magelang, Jawa Tengah, ID 56151</p>
                </div>
                <div class="footer-section">
                    <h3>Email</h3>
                    <p>kalegendesa152@gmail.com</p>
                </div>
                <div class="footer-section">
                    <h3>Contact Person</h3>
                    <p>087739778736</p>
                    <p>(Faizal Rahman)</p>
                </div>
                <div class="footer-section">
                    <h3>Social Media</h3>
                    <p><b>YouTube: </b>Desa Kalegen</p>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>BUMDES KALEGEN</b> All Rights Reserved.
        </div>
    </div>
    
</body>
</html>