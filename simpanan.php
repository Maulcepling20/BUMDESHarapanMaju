<?php 
include("inc_header_members.php");
include_once("inc/inc_koneksi.php");

if($_SESSION['members_email'] == ''){
    header("location: login.php");
    exit();
}
?>

<?php

$sukses = "";

// Ambil nama lengkap dari tabel members
$nama_lengkap = isset($_SESSION['members_nama_lengkap']) ? $_SESSION['members_nama_lengkap'] : '';

// Dapatkan nama lengkap dari tabel members jika ada
if (!empty($nama_lengkap)) {
    // Query untuk memastikan nama lengkap ada di tabel members
    $sql_check = "SELECT nama_lengkap FROM members WHERE nama_lengkap = ?";
    $stmt = $koneksi->prepare($sql_check);
    $stmt->bind_param("s", $nama_lengkap);
    $stmt->execute();
    $result_check = $stmt->get_result();

    if ($result_check->num_rows === 0) {
        // Jika tidak ada data, set nama_lengkap ke string kosong
        $nama_lengkap = '';
    }
}
?>

<?php if ($sukses) { ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php } ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-2">Nama Lengkap</th>
            <th class="col-2">Tanggal</th>
            <th class="col-2">Simpanan</th>
            <th class="col-1">Bukti</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Membuat query untuk mengambil data berdasarkan nama lengkap
        $sqltambahan = "";
        if (!empty($nama_lengkap)) {
            $sqltambahan = " WHERE nama_lengkap = '" . $koneksi->real_escape_string($nama_lengkap) . "'";
        }

        $sql1 = "SELECT * FROM simpan $sqltambahan";
        $per_halaman = 8;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
        $q1 = mysqli_query($koneksi, $sql1);
        $total = mysqli_num_rows($q1);
        $pages = ceil($total / $per_halaman);
        $nomor = $mulai + 1;
        $sql1 = $sql1 . " ORDER BY nama_lengkap DESC LIMIT $mulai, $per_halaman";

        $q1 = mysqli_query($koneksi, $sql1);
        while ($r1 = mysqli_fetch_array($q1)) {
        ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo htmlspecialchars($r1['nama_lengkap']) ?></td>
                <td><?php echo htmlspecialchars($r1['Tanggal']) ?></td>
                <td><?php echo htmlspecialchars($r1['Simpanan']) ?></td>
                <td><?php echo strip_tags($r1['Bukti'], '<img><br>') ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <li class="page-item">
                <a class="page-link" href="simpan.php?page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>   

<?php include("inc_footer_tampilan.php") ?>
