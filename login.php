<?php include("inc_header_tampilan.php")?>
<h3>Login Ke Halaman Members</h3>
<?php 
$email      = "";
$password   = "";
$err        = "";

if(isset($_POST['login'])){
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    if($email == '' or $password == ''){
        $err .= "<li>Silakan masukkan semua isian</li>";
    }else{
        $sql1   = "select * from members where email = '$email'";
        $q1     = mysqli_query($koneksi,$sql1);
        $r1     = mysqli_fetch_array($q1);
        $n1     = mysqli_num_rows($q1);

        if($n1 < 1){
            $err .= "<li>Akun tidak ditemukan</li>";
        }

        if(empty($err)){
            $_SESSION['members_email'] = $email;
            $_SESSION['members_nama_lengkap'] = $r1['nama_lengkap'];
            
            header("location:halaman.php");
            exit();
        }
    }
}
?>
<?php if($err){ echo "<div class='error'><ul class='pesan'>$err</ul></div>";}?>
<form action="" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td><input type="text" name="email" class="input" value="<?php echo $email?>"/></td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td><input type="password" name="password" class="input" /></td>
        </tr>
        <tr>
        <br>
        <td></td>
        <td>
            <br>
            Belum punya akun? Silahkan <a href='<?php echo url_dasar()?>/pendaftaran.php'>Daftar Akun</a>
            <br>
            Lupa Password?,<a href='<?php echo url_dasar()?>/lupa_password.php'>Ganti Password</a>
        </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="login" value="Login" class="tbl-biru"/></td>
        </tr>
</div>
    </table>
</form>
<?php include("inc_footer_tampilan.php")?>