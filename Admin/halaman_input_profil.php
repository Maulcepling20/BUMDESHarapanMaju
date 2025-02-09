<?php include("inc_header.php")?>
<?php
$id= "";
$Kalimat_1 = "";
$Kalimat_2 = "";
$Foto_1 = "";
$Foto_2 = "";
$sukses = "";
$error = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if($id !="") {
    $sql1 = "SELECT * from beranda where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_array($q1);
    $Kalimat_1 = $r1['Kalimat_1'];
    $Kalimat_2 = $r1['Kalimat_2'];
    $Foto_1 = $r1['Foto_1'];
    $Foto_2 = $r1['Foto_2'];

    if($Kalimat_1 == '') {
        $error = "Data Tidak Ditemukan";
    }
}

if(isset($_POST['beranda'])) {
    $Kalimat_1 = $_POST['Kalimat_1'];
    $Kalimat_2 = $_POST['Kalimat_2'];
    $Foto_1 = $_POST['Foto_1'];
    $Foto_2 = $_POST['Foto_2'];

    if($Kalimat_1 == '' or $Kalimat_2 == '' or $Foto_1 == '' or $Foto_2=='') {
        $error = "Silahkan Isi Semua Data Yang Diperlukan.";
    }
    print_r($_FILES);

    if(empty($error)){
        if($id !="") {
            $sql1 = "UPDATE beranda SET Kalimat_1 = '$Kalimat_1', Kalimat_2 = '$Kalimat_2', Foto_1 = '$Foto_1', Foto_2 = '$Foto_2' where id = '$id'";
        } else {
            $sql1 = "INSERT INTO beranda (Kalimat_1, Kalimat_2, Foto_1, Foto_2) values ('$Kalimat_1', '$Kalimat_2', '$Foto_1', '$Foto_2')";
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
    <a href="beranda.php">
        << Kembali Ke Halaman beranda
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
   <label for="Kalimat_1" class="col-sm-2 col-form-label">Kalimat_1</label>
   <div class="col-sm-10">
   <textarea name="Kalimat_1" class="form-control" id="summernote"><?php echo $Kalimat_1 ?></textarea>
   </div>
 </div>
 <div class="mb-3 row">
   <label for="Kalimat_2" class="col-sm-2 col-form-label">Kalimat_2</label>
   <div class="col-sm-10">
   <textarea name="Kalimat_2" class="form-control" id="summernote"><?php echo $Kalimat_2 ?></textarea>
   </div>
 </div>
 <div class="mb-3 row">
   <label for="Foto_1" class="col-sm-2 col-form-label">Foto_1</label>
   <div class="col-sm-10">
   <input type="file" class="form-control" id="Foto_1" name="Foto_1">
   </div>
 </div>
 </div>
 <div class="mb-3 row">
 <label for="Foto_2" class="col-sm-2 col-form-label">Foto_2</label>
 <div class="col-sm-10">
   <textarea name="Foto_2" class="form-control" id="summernote"><?php echo $Foto_2 ?></textarea>
   </div>
 </div>
 <div class="mb-3 row">
   <div class="col-sm-2"></div>
   <div class="col-sm-10">
   <input type="submit" name="beranda" value="Simpan Data" class="btn btn-primary"/>
   </div>
 </div>
</form>
<?php include("inc_footer.php")?>