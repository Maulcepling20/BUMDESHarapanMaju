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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <link href="../css/summernote-image-list.min.css">
    <script src="../js/summernote-image-list.min.js"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
      .image-list-content .col-lg-3 {width: 100%;}
      .image-list-content img {float:left; width:20%}
      .image-list-content p {float:left; padding-left:20px}
      .image-list-item {padding:10px 0px 10px 0px}
    </style>
    <link rel="stylesheet" href="<?php echo url_dasar()?>/css/style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href='<?php echo url_dasar()?>'>BUMDESKalegen</a></div>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo url_dasar()?>/halaman.php">Beranda</a></li>
                    <li><a href="<?php echo url_dasar()?>/simpanan.php">Simpanan</a></li>
                    <li><a href="<?php echo url_dasar()?>/pinjaman.php">Pinjaman</a></li>
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
</body>
    <div class="wrapper">