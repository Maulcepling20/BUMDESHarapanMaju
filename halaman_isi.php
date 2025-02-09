<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f5f7fa;
}

.sidebar {
    width: 250px;
    background-color: #2b3e50;
    color: #fff;
    height: 100vh;
    position: fixed;
}

.logo {
    text-align: center;
    padding: 20px;
}

.logo img {
    max-width: 80px;
}

.logo h2 {
    margin: 10px 0;
    font-size: 22px;
}

.logo p {
    font-size: 14px;
}

.menu {
    list-style: none;
    padding: 0;
}

.menu li {
    padding: 15px 20px;
}

.menu li a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.menu li a:hover {
    background-color: #1a2739;
}

.content {
    margin-left: 250px;
    padding: 20px;
}

.header {
    text-align: right;
    padding: 10px;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
}

.main {
    background-color: #fff;
    padding: 20px;
    margin-top: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.main h1 {
    margin-top: 0;
}

.footer {
    text-align: right;
    padding: 10px;
    margin-top: 20px;
    background-color: #fff;
    border-top: 1px solid #ddd;
}
</style>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PMB Online</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="path/to/logo.png" alt="UNNES Logo">
            <h2>UNNES</h2>
            <p>Universitas Negeri Semarang</p>
        </div>
        <ul class="menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Pendaftaran</a></li>
            <li><a href="#">Daftar Ulang</a></li>
            <li><a href="#">Pembayaran UKT</a></li>
            <li><a href="#">Jadwal Kuliah</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <p>Selasa, 13 Agustus 2024</p>
        </div>
        <div class="main">
            <h1>Dashboard</h1>
            <p>Selamat datang di sistem informasi Penerimaan Mahasiswa Baru (PMB) Online. Sistem ini disusun oleh UNNES team.</p>
            <h2>Panduan Pendaftaran:</h2>
            <ol>
                <li>Pada bagian menu, klik 'Pendaftaran'.</li>
                <li>Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data yang salah.</li>
                <li>Klik submit, kemudian klik konfirmasi. Setelah dikonfirmasi, data tidak dapat diubah kembali.</li>
                <li>Jika sudah, pendaftaran selesai.</li>
            </ol>
            <p><strong>Note:</strong> Pihak universitas baru akan menerima data Anda setelah Anda klik 'konfirmasi'</p>
        </div>
        <div class="footer">
            <p>PMB Online by UNNES team</p>
        </div>
    </div>
</body>
</html>
