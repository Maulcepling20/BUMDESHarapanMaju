<?php include("inc_header.php")?>
<?php
$id= "";
$nama_lengkap = "";
$Tanggal = "";
$Pinjaman = "";
$Bukti = "";
$error = "";
$sukses = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if($id !="") {
    $sql1 = "SELECT * from pinjam where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_array($q1);                 
    $nama_lengkap = $r1['nama_lengkap'];
    $Tanggal = $r1['Tanggal'];
    $Pinjaman = $r1['Pinjaman'];
    $Bukti = $r1['Bukti'];

    if($nama_lengkap == '') {
        $error = "Data Tidak Ditemukan";
    }
}

if(isset($_POST['pinjam'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $Tanggal = $_POST['Tanggal'];
    $Pinjaman = $_POST['Pinjaman'];
    $Bukti = $_POST['Bukti'];

    if($nama_lengkap == '' or $Tanggal == '' or $Pinjaman=='' or $Bukti=='') {
        $error = "Silahkan Isi Semua Data Yang Diperlukan.";
    }

    if(empty($error)){
        if($id !="") {
            $sql1 = "UPDATE pinjam SET nama_lengkap = '$nama_lengkap', Tanggal = '$Tanggal', Pinjaman = '$Pinjaman', Bukti = '$Bukti' where id = '$id'";
        } else {
            $sql1 = "INSERT INTO pinjam (nama_lengkap, Tanggal, Pinjaman, Bukti) values ('$nama_lengkap', '$Tanggal', '$Pinjaman', '$Bukti')";
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
        << Kembali Ke Halaman Pinjaman
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
   <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
   <div class="col-sm-10">
   <input type="text" class="form-control" id="nama_lengkap" value="<?php echo $nama_lengkap ?>" name="nama_lengkap">
   </div>
 </div>
 <div class="mb-3 row">
   <label for="Tanggal" class="col-sm-2 col-form-label">Tanggal</label>
   <div class="col-sm-10">
   <input type="date" class="form-control" id="Tanggal" value="<?php echo $Tanggal ?>" name="Tanggal">
   </div>
 </div>
 <div class="mb-3 row">
   <label for="Pinjaman" class="col-sm-2 col-form-label">Pinjaman</label>
   <div class="col-sm-10">
   <input type="number" class="form-control" id="Pinjaman" value="<?php echo $Pinjaman ?>" name="Pinjaman">
   </div>
 </div>
 <div class="mb-3 row">
 <label for="Bukti" class="col-sm-2 col-form-label">Bukti</label>
 <div class="col-sm-10">
   <textarea name="Bukti" class="form-control" id="summernote"><?php echo $Bukti ?></textarea>
   </div>
 </div>
 <div class="mb-3 row">
   <div class="col-sm-2"></div>
   <div class="col-sm-10">
   <input type="submit" name="pinjam" value="Simpan Data" class="btn btn-primary"/>
   </div>
 </div>
</form>
<?php include("inc_footer.php")?>