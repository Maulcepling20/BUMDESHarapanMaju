<?php include ("inc_header.php")?>
      <?php
      $sukses = "";
      $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
      if (isset($_GET['op'])) {
          $op = $_GET['op'];
      } else {
          $op = "";
      }
      if ($op == 'delete') {
          $id = $_GET['id'];
          $sql1   = "delete from profil_desa where id = '$id'";
          $q1     = mysqli_query($koneksi, $sql1);
          if ($q1) {
              $sukses     = "Berhasil Hapus Data";
          }
      }
      ?>

        <h1>Halaman Admin</h1>
        <p>
            <a href="halaman_input_profil.php">
                <input type="button" class="btn btn-primary" value="Input Data"/>
            </a>
        </p>
        <?php
        if ($sukses) {
        ?>
        <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
        </div>
        <?php
        }
        ?>
        <form class="row g-3" method="get">        
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Masukan Kata Kunci" name="katakunci" value="<?php echo $katakunci?>"/>
            </div>
            <div class="col-auto">
              <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary"/>
            </div>
        </form>
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="col-1">#</th>
              <th class="col-2">Kalimat_1</th>
              <th class="col-2">Kalimat_2</th>
              <th class="col-2">Foto_1</th>
              <th class="col-2">Foto_2</th>
              <th class="col-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqltambahan = "";
            $per_halaman = 8;
            if($katakunci != '') {
              $array_katakunci = explode(" ",$katakunci);
              for($x=0; $x<count($array_katakunci); $x++) {
                $sqlcari[] = "(Kalimat_1 like '%".$array_katakunci[$x]."%' or Kalimat_2 like '%".$array_katakunci[$x]."%' or Foto_1 like '%".$array_katakunci[$x]."%' or Foto_2 like '%".$array_katakunci[$x]."%')";
              } 
              $sqltambahan = " where ".implode(" or ",$sqlcari);
            }
            $sql1   = "select * from profil_desa $sqltambahan";
            $page   = isset($_GET['page'])?(int)$_GET['page']:1;
            $mulai  = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
            $q1     = mysqli_query($koneksi,$sql1);
            $total  = mysqli_num_rows($q1);
            $pages  = ceil($total / $per_halaman);
            $nomor  = $mulai + 1;
            $sql1   = $sql1." order by Kalimat_1 desc limit $mulai,$per_halaman";
    
            $q1 = mysqli_query($koneksi, $sql1);
            while($r1 = mysqli_fetch_array($q1)) {
              ?>
            <tr>
            <td><?php echo $nomor++?></td>
            <td><?php echo $r1['Kalimat_1']?></td>
            <td><?php echo $r1['Kalimat_2']?></td>
            <td><?php echo $r1['Foto_1']?></td>
            <td><?php echo $r1['Foto_2']?></td>
            <td>
            <a href="halaman_input_profil.php?id=<?php echo $r1['id']?>">
              <span class="badge bg-warning text-dark">Edit</span>
            </a>
            <a href = "profil_desa.php?op=delete&id=<?php echo $r1['id']?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">
              <span class="badge bg-danger">Delete</span>
            </a>
            </td>
            </tr>
              <?php
            }
            ?>
          </tbody>
        </table>  

        <nav aria-label="Page navigation example">
          <ul class="pagination">
          <?php
          $cari = isset($_GET['cari'])? $_GET['cari'] : "";

          for($i=1; $i <= $pages; $i++) {
            ?>
            <li class="page-item">
            <a class="page-link" href="profil_desa.php?katakunci=<?php echo $katakunci?>&cari=<?php echo $cari?>&page=<?php echo $i?>"><?php echo $i ?></a>
          </li>
          <?php
          }
          ?>
          </ul>
        </nav>   
        <?php include ("inc_footer.php")?>