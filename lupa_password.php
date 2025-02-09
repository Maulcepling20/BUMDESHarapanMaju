<?php include("inc_header_tampilan.php");?>
<?php
$sukses = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : '';
    $password_baru = isset($_POST['password_baru']) ? mysqli_real_escape_string($koneksi, $_POST['password_baru']) : '';

    // Validasi input
    if (empty($email)) {
        $error = "Email tidak boleh kosong.";
    } elseif (empty($password_baru)) {
        $error = "Password baru tidak boleh kosong.";
    } else {
        // Cek apakah email terdaftar
        $sql = "SELECT * FROM members WHERE email = '$email'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Update password dengan menggunakan md5
            $password_md5 = md5($password_baru);
            $sql_update = "UPDATE members SET password = '$password_md5' WHERE email = '$email'";

            if (mysqli_query($koneksi, $sql_update)) {
                $sukses = "Password berhasil diperbarui.";
            } else {
                $error = "Gagal memperbarui password. Silakan coba lagi.";
            }
        } else {
            $error = "Email tidak terdaftar.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Lupa Password</h2>

    <?php if ($sukses) { ?>
        <div class="alert alert-success">
            <?php echo $sukses; ?>
        </div>
    <?php } ?>

    <?php if ($error) { ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password_baru" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password_baru" name="password_baru" required>
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>
</body>
</html>
<?php include("inc_footer_tampilan.php")?>