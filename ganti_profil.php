<?php include("inc_header_members.php");?>
<?php
if(isset($_SESSION['members_email']) == ''){ //sudah dalam keadaan login
     header("location: login.php");
     exit();    
}
?>

<h3>Ganti Akun</h3>
<?php
$email = "";
$nama_lengkap = "";
$Alamat = "";
$NIK = "";
$err = "";
$sukses = "";

if(isset($_POST['simpan'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $Alamat = $_POST['Alamat'];
    $NIK = $_POST['NIK'];
    $password = $_POST['password'];

    if($nama_lengkap == ''){
        $err .= "<li>Silahkan masukan nama lengkap</li>";
    }
    if(empty($err)){
        $sql1 = "update members set nama_lengkap = '".$nama_lengkap."' where email = '".$_SESSION['members_email']."'";
        mysqli_query($koneksi,$sql1);
        $_SESSION['members_nama_lengkap'] = $nama_lengkap;

        if($password){
            $sql2 = "update members set password = md5($password) where email = '".$_SESSION['members_email']."'";
            mysqli_query($koneksi,$sql1);
        }

        $sukses = "Data Berhasil Diubah";
    }
}
?>
<?php if($err) {echo "<div class='error'><ul>$err</ul></div>";} ?>
<?php if($sukses) {echo "<div class='sukses'>$sukses</div>";} ?>

<form action="" method="POST">
    <table>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $_SESSION['members_nama_lengkap']?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td>
                <input type="text" name="Alamat" class="input" value="<?php echo $Alamat?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td>
                <input type="text" name="NIK" class="input" value="<?php echo $NIK?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td>
                <?php echo $_SESSION['members_email']?>
            </td>
        </tr>
        <tr>
            <td class="label">Password Baru</td>
            <td>
                <input type="password" name="password" class="input"/>
            </td>
        </tr>
    
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="simpan" class="tbl-biru"/>
            </td>
        </tr>
    </table>
</form>

<?php include("inc_footer_tampilan.php")?>