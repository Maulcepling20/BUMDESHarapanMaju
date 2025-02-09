<?php include("inc_header_members.php")?>
<?php
if($_SESSION['members_email'] == ''){
    header("location: login.php");
    exit();
}
?>
<div style="background-color: red;font-size:large;padding:50px;color:#FFFFFF;text-align:center">
Selamat datang <?php echo $_SESSION['members_nama_lengkap']?> di BUMDES Harapan Maju Kalegen. 
</div>
<?php include("inc_footer_tampilan.php")?>