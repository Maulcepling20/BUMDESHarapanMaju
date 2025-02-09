<?php include("inc_header.php")?>
<?php
$id= "";
$Nama = "";
$NIK = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if($id !="") {
    $sql1 = "SELECT * from 'data admin' where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_array($q1);
    $Nama = $r1['Nama'];
    $NIK = $r1['NIK'];

    if($Nama == '') {
        $error = "Data Tidak Ditemukan";
    }
}

if(isset($_POST['data admin'])) {
    $Nama = $_POST['Nama'];
    $NIK = $_POST['NIK'];

    if($Nama == '' or $NIK == '') {
        $error = "Silahkan Isi Semua Data Yang Diperlukan.";
    }

    if(empty($error)){
        if($id !="") {
            $sql1 = "UPDATE 'data admin' SET Nama = '$Nama', NIK = '$NIK' where id = '$id'";
        } else {
            $sql1 = "INSERT INTO pinjam (Nama, NIK) values ('$Nama', '$NIK')";
        }
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1){
            $sukses = "Sukses Memasukan Data";
        }else{
            $error = "Coba Lagi";
        }
    }
}
?>
<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
    <a href="pinjam.php">
        << Kembali Ke Halaman Data Admin
    </a>
</div>
<?php
if($error){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php
}
?>
<?php
if($sukses){
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>
<form action="" method="post" enctype = "multipart/form-data">
 <div class="mb-3 row">
   <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
   <div class="col-sm-10">
   <input type="text" class="form-control" id="Nama" value="<?php echo $Nama ?>" name="Nama">
   </div>
 </div>
 <div class="mb-3 row">
   <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
   <div class="col-sm-10">
   <input type="number" class="form-control" id="NIK" value="<?php echo $NIK ?>" name="NIK">
   </div>
 </div>
 <div class="mb-3 row">
   <div class="col-sm-2"></div>
   <div class="col-sm-10">
   <input type="submit" name="data admin" value="Simpan Data" class="btn btn-primary"/>
   </div>
 </div>
</form>
<?php include("inc_footer.php")?>