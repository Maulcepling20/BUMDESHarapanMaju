<?php 
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUMDES Kalegen</title>
    <link rel="stylesheet" href="<?php echo url_dasar()?>/css/style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href='<?php echo url_dasar()?>'>BUMDESKalegen</a></div>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo url_dasar()?>#home">Beranda</a></li>
                    <li><a href="<?php echo url_dasar()?>#courses">Tentang</a></li>
                    <li><a href="<?php echo url_dasar()?>#contact">Contact</a></li>
                    <li>
                        <?php if(isset($_SESSION['members_nama_lengkap'])){
                            echo "<a href='".url_dasar()."/ganti_profil.php'>".$_SESSION['members_nama_lengkap']."</a> <a href ='".url_dasar()."/logout.php'>Logout</a>";
                        } else {?>
                        <a href="pendaftaran.php" class="tbl-biru">Sign In</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">