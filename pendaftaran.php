<?php include("inc_header_tampilan.php");?>
<?php
if(isset($_SESSION['members_email']) != ''){ //sudah dalam keadaan login
     header("location: index.php");
     exit();    
}
?>

<h3>Pendaftaran</h3>
<?php
$email = "";
$nama_lengkap = "";
$Alamat = "";
$NIK = "";
$err = "";
$sukses = "";

if(isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $Alamat = $_POST['Alamat'];
    $NIK = $_POST['NIK'];
    $password = $_POST['password'];

    if($email == '' or $nama_lengkap == '' or $Alamat == '' or $NIK == '' or $password = '') {
        $err .= "<li>Silahkan masukan semua isian.</li>";
    }
    
    #cek kesesuaian email
    #Pendaftaran email
    if($email != ''){
        $sql1 = "select email from members where email = '$email'";
        $q1 = mysqli_query($koneksi,$sql1);
        $n1 = mysqli_num_rows($q1);
        if($n1 > 0){
            $err .= "<li>Email sudah terdaftar.</li>";
        }

        #Validasi email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $err .= "<li>Email tidak valid.</li>";
        }
    }

    if(empty($err)) {
        $sql1 = "INSERT INTO members (nama_lengkap, Alamat, NIK, email, password) values ('$nama_lengkap', '$Alamat', '$NIK', '$email', md5('$password'))";
        $q1 = mysqli_query($koneksi,$sql1);
        if($q1) {
            $sukses = "Proses Berhasil, silahkan menuju halaman login";
        }
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
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $nama_lengkap?>"/>
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
                <input type="text" name="email" class="input" value="<?php echo $email?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Password</td>
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